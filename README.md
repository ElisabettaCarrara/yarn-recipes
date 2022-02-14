# Yarn Recipes Plugin for WordPress

## What it does:

### This plugins adds a set of block patterns for the block editor, specifically designed to allow Yarn Crafters to publish patterns and info on the materials they use in their craft.

- The Yarn Recipes block pattern includes basic WordPress blocks that are included in a WordPress fresh install.
- The Sell Yarn Recipes block pattern **is a work in progress** and includes blocks from the Easy Digital Download plugin, that is why this plugin includes a notice recommending the installation of EDD
- the Yarns Block pattern and Needles Block pattern can be used to show detailed information about yarns and needles and **are a work in progress** at the moment.
- The Complete Yarn Recipes block pattern includes Yarn Recipes, Yarns and Needles block patterns styled together in a coherent way and **is a work in progress** at the moment.

## ROADMAP

- Correct plugin heaader and READMI file - **DONE**
- Including a check for dependencies
- Including a check for the WP version to make sure that the plugin can't be activated on an unsupported version (the plugin need the function register_block_pattern to work properly, this was introduced in WP 5.5.0).
- Including a check to verify if EDD is installed and active on the site to make sure the Sell Yarn Recipes block pattern can work properly (I evaluated to include this using a library, but decided against that, I will adapts [this code instead: ](https://github.com/TukuToi/toolwine-rewievs-and-ratings/blob/2ad0e2ef407b00f3a8f4a81f45ca5ff84612d6f3/includes/class-tw-rar-activator.php).
- Include the Sell Yarn Recipes, Needles and Yarns block patterns in the plugin
- Set up a structure for testing the plugin
- Eventually releasing the plugin

This is a project I am doing to learn how to structure a plugin the correct way and to gain confidence by writing something very basic.

In case you have suggestion, you are very welcome to contribute.
