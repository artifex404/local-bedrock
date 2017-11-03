# Local Bedrock
Local Bedrock is a site boilerplate for [Local by Flywheel](https://local.getflywheel.com/) to quickly create a new site with [Roots.io Bedrock](https://roots.io/bedrock/) WordPress installation. 

## Installation

1. `git clone --depth=1 https://github.com/artifex404/local-bedrock && rm -rf local-bedrock/.git local-bedrock/README.md local-bedrock/.gitignore`
2. `cd local-bedrock && zip -r ../local-bedrock.zip . * && cd ..`
3. If you're on mac, you can use `open .` to open the current folder in Finder.
4. Drag and drop `local-bedrock.zip` to the Local by Flywheel application window.
5. Enter details for your new site. Make sure to select a **Custom environment** along with **Nginx**.
6. Update `WP_HOME` variable in `app/public/.env` of the newly created site path. Enter the selected domain in the step 5. 

Now you have a fully working WordPress Bedrock site on Local by Flywheel.

Before you go on developing the site, save the newly created website as a blueprint.

## Saving as Blueprint

1. Right click on the site name you just created.
2. Select `Save as Blueprint`.
3. Click `Save Blueprint` button.

Now whenever you need a clean Bedrock WordPress site, you can just select the saved blueprint from the `Advanced Options` on the new site creation screen in Local by Flywheel.

## Credentials

This site installation creates an WordPress administrator user with the following credentials:

* `User: local-bedrock` 
* `Password: local-bedrock`

## Optional Database cleanup

If during the site import you chose another domain than the original `local-bedrock.dev`, a few places in the database will still have the old domain.

The items still having the old domain are: `wp_posts` sample posts **guid**, and `wp_options` **siteurl** and **home** variables.

It is not crucial to change the siteurl and home variables values in the dadabase, and the **.env** configuration files override them. 

However, if you want to clean up the old domain name:

1. Right click on the site name in Local by Flywheel on the left sidebar, and select `Open Site SSH`
2. In the opened terminal write, make sure to replace XXXXX by your newly chosen domain: `cd /app/public && wp search-replace local-bedrock.dev XXXXX --all-tables`