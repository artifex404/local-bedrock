# Local Bedrock
Local Bedrock is a site boilerplate for [Local by Flywheel](https://local.getflywheel.com/) to quickly create a new site with [Roots.io Bedrock](https://roots.io/bedrock/) WordPress installation. 

## Installation

1. `git clone --depth=1 https://github.com/artifex404/local-bedrock && rm -rf local-bedrock/.git`
2. `cd local-bedrock && zip -r ../local-bedrock.zip . * && cd ..`
3. If you're on mac, you can use `open .` to open the current folder in Finder.
4. Drag and drop local-bedrock.zip to the Local by Flywheel application window
5. Enter details for your new site
6. Make sure to select a **Custom environment** along with **Nginx**
7. Update `WP_HOME` variable in `app/public/.env` of the newly created site path. Enter the selected domain in the step 5. 

Enjoy!

## Credentials

This site installation creates an WordPress administrator user with the following credentials:

* `User: local-bedrock` 
* `Password: local-bedrock`