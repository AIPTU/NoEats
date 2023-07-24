# NoEats

[![](https://poggit.pmmp.io/shield.state/NoEats)](https://poggit.pmmp.io/p/NoEats)
[![](https://poggit.pmmp.io/shield.dl.total/NoEats)](https://poggit.pmmp.io/p/NoEats)

A PocketMine-MP plugin to regulate player hunger and prohibit eating certain foods easily.

# Features

- `Food Item Restriction`: Administrators can define a list of food items that players are not allowed to eat.
- `World-Specific Configuration`: Different worlds can have different food item restrictions.
- `Mode Selection`: Choose between "None," "Blacklist," or "Whitelist" mode to determine how world-specific configurations are applied.
- `Hunger Event Control`: Administrators can enable or disable hunger events for players.
- `Customizable Messages`: Customize the message displayed to players when they attempt to eat a restricted food item.
- `Bypass Permissions`: Operators can be granted permissions to bypass the food item restrictions and hunger event cancellation.
- `World Validation`: It checks if the worlds listed in the configuration file exist and are generated in the server. Invalid worlds are ignored.
- `Item Validation`: It ensures that the food items listed in the configuration are valid edible items. Non-edible items are ignored.

# Permissions

- `noeats.bypass.eating`: Players with this permission can bypass the plugin's restrictions on eating food items.
- `noeats.bypass.hunger`: Players with this permission can bypass the cancellation of hunger events imposed by the plugin.

# Default Config
```yaml
# Do not change this (Only for internal use)!
config-version: 1.2

# If set to true, players will experience hunger. If set to false, players won't experience hunger.
# This option allows you to enable or disable the hunger mechanic for players in the server.
hunger: true

# The message displayed when a player attempts to eat a restricted food item.
# You can use color codes by using "§" or "&" before the color code.
# This message will be shown to players when they try to eat an item that is restricted based on the configuration.
message: "&cYou can't eat your food here"

# Item Restriction Settings
items:
  # List of food items that players are not allowed to eat.
  # This list determines which food items are restricted for consumption by players.
  list:
    - "golden_apple"
    - "cooked_beef"
    - "cooked_chicken"

# World Restriction Settings
worlds:
  # The mode can be either "blacklist," "whitelist," or "none".
  # - "blacklist" mode will prevent players from eating in the specified worlds (blacklisted) and allow eating in other worlds.
  # - "whitelist" mode will only allow players to eat in the specified worlds (whitelisted) and prevent eating in other worlds.
  # - "none" mode will not apply any restrictions, and eating will be allowed in all worlds.
  mode: "blacklist"

  # List of world folder names to be blacklisted or whitelisted (depending on the mode set above).
  # If "mode" is set to "blacklist" or "whitelist," add the world folder names accordingly.
  # If "mode" is set to "none," leave the "list" empty ([]) to allow eating in all worlds.
  list:
    - "world"  # Example: The "world" world folder is blacklisted, and players can't eat here.
    - "world_nether"  # Example: The "world_nether" world folder is blacklisted, and players can't eat here.

# You can add more worlds to the list as needed.
# Note: Make sure to use the correct world folder names as specified in your PocketMine-MP server configuration.
# To disable world-specific eating restriction and allow eating in all worlds, set "mode" to "none" and leave the "list" empty ([]) or remove the "list" entirely.

```

# Upcoming Features

- Currently none planned. You can contribute or suggest for new features.

# Additional Notes

- If you find bugs or want to give suggestions, please visit [here](https://github.com/AIPTU/NoEats/issues).
- We accept all contributions! If you want to contribute, please make a pull request in [here](https://github.com/AIPTU/NoEats/pulls).
- Icons made from [www.flaticon.com](https://www.flaticon.com)
