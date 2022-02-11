<?php

/*
 *
 * Copyright (c) 2021 AIPTU
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

declare(strict_types=1);

namespace aiptu\noeats;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\item\Food;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

final class EventHandler implements Listener
{
	public function __construct(private NoEats $plugin)
	{
	}

	public function getPlugin(): NoEats
	{
		return $this->plugin;
	}

	public function onPlayerExhaust(PlayerExhaustEvent $event): void
	{
		if ($event->isCancelled()) {
			return;
		}

		$player = $event->getPlayer();
		if (!$player instanceof Player) {
			return;
		}

		if (!$this->getPlugin()->getTypedConfig()->getBool('hunger')) {
			if ($player->hasPermission('noeats.bypass.hunger')) {
				return;
			}

			if (!$this->getPlugin()->checkWorld($player->getWorld())) {
				return;
			}

			$event->cancel();
		}
	}

	public function onPlayerItemConsume(PlayerItemConsumeEvent $event): void
	{
		if ($event->isCancelled()) {
			return;
		}

		$player = $event->getPlayer();
		$item = $event->getItem();

		foreach ($this->getPlugin()->getTypedConfig()->getStringList('items.list') as $value) {
			$itemEats = $this->getPlugin()->checkItem($value);
			if (!$itemEats instanceof Food) {
				continue;
			}

			if ($item->equals($itemEats)) {
				if ($player->hasPermission('noeats.bypass')) {
					return;
				}

				if (!$this->getPlugin()->checkWorld($player->getWorld())) {
					return;
				}

				$player->sendPopup(TextFormat::colorize($this->getPlugin()->getTypedConfig()->getString('message', "&cYou can't eat your food here")));
				$event->cancel();
			}
		}
	}
}
