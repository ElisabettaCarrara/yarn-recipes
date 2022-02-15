# Yarn Recipes Plugin for WordPress

## What it does:

### This plugins adds a set of block patterns for the block editor, specifically designed to allow Yarn Crafters to publish patterns and info on the materials they use in their craft.

- The Yarn Recipes block pattern includes basic WordPress blocks that are included in a WordPress fresh install.
- The Sell Yarn Recipes block pattern **is a work in progress** and includes blocks from the Easy Digital Download plugin, that is why this plugin includes a notice recommending the installation of EDD
- the Yarns Block pattern and Needles Block pattern can be used to show detailed information about yarns and needles and **are a work in progress** at the moment.
- The Complete Yarn Recipes block pattern includes Yarn Recipes, Yarns and Needles block patterns styled together in a coherent way and **is a work in progress** at the moment.

## ROADMAP

- Correct plugin heaader and READMI file - **DONE**
- Including a check for the WP version to make sure that the plugin can't be activated on an unsupported version (the plugin need the function register_block_pattern to work properly, this was introduced in WP 5.5.0). **Is it enough to include the require at least 5.5 in the plugin header or should I have a code to check for it also inside the plugin itself?**
- Including a check for dependencies to verify if EDD is installed and active on the site to make sure the Sell Yarn Recipes block pattern can work properly (I evaluated to include this using a library at first, but decided against that, I will adapts [this code instead: ](https://github.com/TukuToi/toolwine-rewievs-and-ratings/blob/2ad0e2ef407b00f3a8f4a81f45ca5ff84612d6f3/includes/class-tw-rar-activator.php) - to understand how to do this properly I am studying [this guide: ](https://waclawjacek.com/check-wordpress-plugin-dependencies/) in detail among others. This check has to be included before the block patterns registration to make sure it can execute the block patterns logic afterwards. **I tried different ways to check dependencies as suggested by the afore mentioned guides and these methods did not work (impossible to activate the plugin due to PHP fatal errors and parsing errors), using the code suggested by @TukuToi instead shows no PHP fatal errors but on activation it doesn't show the admin notice that is supposed to show if EDD isn't installed and active and the plugin is also not prevented from activating when EDD is not installed. I think I did something wrong when amending the code before including it in the plugin but I need to understand where I have gone wrong.**
- Include the Sell Yarn Recipes, Needles and Yarns block patterns in the plugin when the dependencies check has been included
- Set up a structure for testing the plugin
- Eventually releasing the plugin and submitting it to WP repo

This is a project I am doing to learn how to structure a plugin the correct way and to gain confidence by writing something very basic.

In case you have suggestion, you are very welcome to contribute.
