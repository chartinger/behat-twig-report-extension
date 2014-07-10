behat-twig-report-extension
===========================

Create Behat 3 test reports with Twig templates

## About

This extension provides an easy way to create reports of your test runs. It uses Twig for templating.

It term "report" in the extension name is deliberate as the output file will be created after all tests are processed. 

An example can be [found here](http://htmlpreview.github.io/?https://raw.githubusercontent.com/chartinger/behat-twig-report-extension/master/doc/example-output.html)

![Screenshot](https://raw.githubusercontent.com/chartinger/behat-twig-report-extension/master/doc/example.png "Example Screenshot")

## Installation

In your `composer.json` add
```json
{
    "require": {
        ...
        "chartinger/behat-twig-report-extension": "*@dev"
    }
}
```
and update your dependencies

## Usage

To activate this extension add this to your `behat.yml`

```YAML
default:
  extensions:
    chartinger\Behat\AroundHookExtension\AroundHookExtension:
      output:
        file: ./output/index.html
```

## Configuration

You can confgure the templates as well as the output file.

```YAML
default:
  extensions:
    chartinger\Behat\AroundHookExtension\AroundHookExtension:
      templates:
        dir: /path/to/templates
        file: yourtemplate.twig
      output:
        file: ./output/index.html
```

## Known Issues / Limitations

* No output of exact errors


