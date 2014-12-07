# Example TYPO3 Extension on how to extend the bootstrap_package

The new introduction package to TYPO3 6.2 is a distribution with content, assets and configuration.
It is based on the [bootstrap_package](https://github.com/benjaminkott/bootstrap_package) extension provided by Benjamin Kott.

As we saw the growing usage of the introduction package, we thought it might be a good idea to show on how we think you should adapt it to your workflow.

This extension is strongly oppinionated. Mostly because I think it's time for anyone in the TYPO3 community to stick to certain conventions. - Developer or not.

## Remarks regarding the template extension pattern

We generally consider it an anti-pattern to store most settings in a TypoScript template in the target database. To have an easily reproducable environment (or a starter extension for new projects) you will definitely want to place your overrides in an extension and **NOT** in the DB or in fileadmin.

Configuration and templates are **system data** that should not be seen or touched by anybody else except the developers. If you have a workflow that is based on a monolithic fileadmin/template directory - welcome to the 21st century: There's extensions that can carry all of your stuff.

## Contained example overrides

The example library is meant to be growing over time. You may request a new example or add it yourself and pull-request to this repository. We expect contributions to be made from a feature branch - anything else will be rejected.

## LESS preprocessor overrides

LESS is a flexible CSS preprocessor that allows you to put variables and further logic in your CSS code. You should definitely be using a CSS preprocessor, again it's the 21st century and we're not back in the 90s.

If you need to persistently override less variables, you're much much faster and resilient to human errors when those come from a file.

You want to be able to roll back changes-store your settings in a file in your custom extension and put this one into the version control system of your liking.

### Example: Override LESS variables

To see this example, include the ``'Sample Bootstrap Package Overrides - LESS constants'`` TypoScript template.

If you feel confident with the bootstrap_package theme, take this example and adjust your variables.

Configuration: [Configuration/TypoScript/OverrideLessFile/constants.txt](Configuration/TypoScript/OverrideLessFile/constants.txt)

### Example: Override less theme file completely

This example replaces the original less file. - Again it's an easy task with LESS to add your own modifications.

Include the TypoScript template ``'Sample Bootstrap Package Overrides - Override Less file'``.

Configuration: [Configuration/TypoScript/OverrideLessFile/setup.txt](Configuration/TypoScript/OverrideLessFile/constants.txt)

### Example: Include a custom backend layout with a custom template

You will definitely want to implement your own Page Templates. The bootstrap_package implements a custom ``Backend Layout Data Provider``. As there can only be one of those (Highlander syndrome!), you need to hook into it. The given DataProvider retrieves its configuration from a Page TSConfig array.

Now to implement a custom layout, you need to follow these steps:

* Add some Page TSConfig containing the **BackendLayout** to configure the layout-selector in the page properties. (I do forcefully add TSConfig via [ext_localconf.php](ext_localconf.php) so my BackendLayout is always available, when the extension is installed). Located at [Configuration/PageTS/Mod/web_layout.txt](Configuration/PageTS/Mod/web_layout.txt) and the referenced files..
* Add some TypoScript to enable the new fluid template and render it in the frontend when my new layout is selected [Configuration/TypoScript/setup.txt](Configuration/TypoScript/setup.txt)

You need to include the ``'Bootstrap Package Overrides - General'`` TypoScript template to make the frontend rendering work. (Imagine you would need a different frontend output at different subtrees while keeping the same backend layout. This is really flexible)

Due to restrictions of the DataProvider, the backend layouts have to be prefixed with ``bootstrap_package__``.
