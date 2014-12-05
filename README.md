# Example TYPO3 Extension on how to extend the bootstrap_package

The new introduction package to TYPO3 6.2 is a distribution with content, assets and configuration.
It is based on the [bootstrap_package](https://github.com/benjaminkott/bootstrap_package) extension provided by Benjamin Kott.

As we saw the growing usage of the introduction package, we thought it might be a good idea to show on how we think you should adapt it to your workflow.

This extension is strongly oppinionated. Mostly because I think it's time for anyone in the TYPO3 community to stick to certain conventions. - Developer or not.

## Remarks regarding the template extension pattern

We generally consider it an anti-pattern to store most settings in a TypoScript template in the target database. To have an easily reproducable environment (or a starter extension for new projects) you will definately want to place your overrides in an extension and **NOT** in the DB or in fileadmin.

Configuration and templates are **system data** that should not be seen or touched by anybody else except the developers. If you have a workflow that is based on a monolithic fileadmin/template directory - welcome to the 21st century: There's extensions that can carry all of your stuff.

## Contained example overrides

The example library is meant to be growing over time. You may request a new example or add it yourself and pull-request to this repository. We expect contributions to be made from a feature branch - anything else will be rejected.

## LESS preprocessor overrides

LESS is a flexible CSS preprocessor that allows you to put variables and further logic in your CSS code. You should definately be using a CSS preprocessor, again it's the 21st century and we're not back in the 90s.

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
