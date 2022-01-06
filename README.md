# NoEats

[![Discord](https://img.shields.io/discord/830063409000087612?color=7389D8&label=discord)](https://discord.com/invite/EggNF9hvGv)

A PocketMine-MP plugin to regulate player hunger and prohibit eating certain foods easily.

# Features

- Managing hunger.
- Permission bypass.
- Supports `&` as formatting codes.
- Custom item that can't be eat.
- Per world support.
- Lightweight and open source ❤️

# Permissions

- Permission `noeats.bypass` allows the user to bypass eating.
- Permission `noeats.bypass.hunger` allows the user to bypass hunger.

# Default Config
```yaml
---
# Do not change this (Only for internal use)!
config-version: 1.0

# If you want to activate player hunger.
hunger: true

# Message used when canceling a player who ate food.
# Use "§" or "&" to color the message.
message: "&cYou can't eat your food here"

items:
  # List of items that can't be eat.
  # This must be food to work.
  # If the item has meta, you can use the format "minecraft:id:meta".
  list:
    - "minecraft:golden_apple"
    - "minecraft:cooked_beef"
    - "minecraft:cooked_chicken"

worlds:
  # The mode can be either "blacklist" or "whitelist".
  # The blacklist mode will only cancel players to eat and players to be hungry according to the name of a predetermined world folder and will allow player feeding and hunger players around the world.
  # The whitelist mode will only allow players to eat and players to be hungry according to the name of a predetermined world folder and will cancel player feeding and starve players around the world.
  mode: "blacklist"
  # List of world folder names to blacklist/whitelist (depending on the mode set above).
  # Leave it blank if you want to let players eat all over the world.
  list:
    - "world"
...

```

# Upcoming Features

- Currently none planned. You can contribute or suggest for new features.

# Additional Notes

- If you find bugs or want to give suggestions, please visit [here](https://github.com/AIPTU/NoEats/issues).
- We accept any contributions! If you want to contribute please make a pull request in [here](https://github.com/AIPTU/NoEats/pulls).
- Icons made from [www.flaticon.com](https://www.flaticon.com)
