# Local Bedrock
Local Bedrock is a site boilerplate for [Local by Flywheel](https://local.getflywheel.com/) to quickly create a new site with [Roots.io Bedrock](https://roots.io/bedrock/) WordPress installation. 

## Installation

1. `git clone --depth=1 https://github.com/artifex404/local-bedrock rm -rf !$/.git`
2. `zip local-bedrock.zip local-bedrock/*`
3. Drag and drop local-bedrock.zip to the Local by Flywheel application window
4. Enter details for your new site
5. Make sure to select a **Custom environment** along with **Nginx**
6. Update `WP_HOME` variable in `/app/public/.env`. Enter recently selected domain of your new site. 

Enjoy!

## Credentials

This site installation creates an WordPress administrator user with the following credentials:

* `User: local-bedrock` 
* `Password: local-bedrock`