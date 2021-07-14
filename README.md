# zohocrm api integration with php
**download the code and set in your local htdocs directory**

**step-1**
first creat zoho crm self client 
https://api-console.zoho.com/
copy the client_id and secret id and access code

**step-2**
run this method with for refresh token
**refresh_token($token_url);** and set in **$refresh_token 		= "refresh_token";**
**Note:** no need to run again this method after get refresh token.

**step-3**

**$access_token_url = $base_accounts_url."/oauth/v2/token?refresh_token=".$refresh_token."&client_id=".$client_id."&client_secret=".$client_secret."&grant_type=refresh_token";**

run this method **generate_access_token($access_token_url)** you will get **access token**

**step-4**
**note:** module name can be Leads,accounts,contacts etc except reports 
and in the last step you have to run **get_records($access_token,$module)**

**var_dump(get_records($access_token,$module))**




