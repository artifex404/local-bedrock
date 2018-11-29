# Local Bedrock
Local Bedrock is a site boilerplate for [Local by Flywheel](https://local.getflywheel.com/) to quickly create a new site with [Roots.io Bedrock](https://roots.io/bedrock/) WordPress installation. 

## Compatibility
Those instructions are tested with the latest stable Local by Flywheel version and the latest Local Environment. As time of writing those are 2.4.3 and 1.3.1 respectively.

## Installation

1. `git clone --depth=1 https://github.com/artifex404/local-bedrock && rm -rf local-bedrock/.git local-bedrock/README.md local-bedrock/.gitignore`
2. `cd local-bedrock && zip -r ../local-bedrock.zip . * && cd ..`
3. If you're on mac, you can use `open .` to open the current folder in Finder.
4. Drag and drop `local-bedrock.zip` to the Local by Flywheel application window.
5. Enter details for your new site. Make sure to select a **Custom environment** along with **Nginx**.
6. Proceed with the import. If the import gets stuck. Select *Restart Local Machine* from the *Help* menu and proceed with the next steps after the restart.
7. Update `WP_HOME` variable in `app/public/.env` of the newly created site path. Enter the selected domain in the step 5. 
8. Generate new site salts from [https://roots.io/salts.html](https://roots.io/salts.html) and replace the existing ones in `app/public/.env`.
9. Click the right mouse on the newly created site entry in Local by Flywheel and select **Open Site SSH**.
10. Copy and paste the following command to the opened terminal and press enter: `sed "s/root \/app\/public\/\;/root \/app\/public\/web\/;/g" /etc/nginx/wordpress/site.conf > /etc/nginx/wordpress/site.conf`
11. Copy and paste the following command too to fix the WP-CLI path: `sed "s/\/app\/public/\/app\/public\/web/g" /wp-cli.yml > /wp-cli.yml`
12. Restart the newly created site by clicking first the green dot near the newly created site to stop and once stopped the gray dot to start.

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

If during the site import you chose another domain than the original `local-bedrock.test`, a few places in the database will still have the old domain.

The items still having the old domain are: `wp_posts` sample posts **guid**, and `wp_options` **siteurl** and **home** variables.

It is not crucial to change the siteurl and home variables values in the database, since the **.env** configuration file override them. 

However, if you want to clean up the old domain name:

1. Right click on the site name in Local by Flywheel on the left sidebar, and select `Open Site SSH`
2. In the opened terminal write, make sure to replace XXXXX by your newly chosen domain: `cd /app/public && wp search-replace local-bedrock.test XXXXX --all-tables`
