
## Welcome to the blog management system, 
 
where the admin is the one with the password  yes_we_can,  
and the other users are regular users. Each blog has multiple categories, and each category has multiple blogs, which necessitated creating a pivot table.  

Additionally, a single user may have multiple favorite blogs, and each blog can belong to multiple users, which required creating another pivot table .  

The admin has several permissions that regular users are not allowed to perform, including creating blogs and categories, editing blogs and categories, deleting either (soft delete), and restoring soft-deleted records.  

Users, on the other hand, can view all blogs, add a blog to their favorites, remove it from favorites, and perform several other actions.  

Images are stored in the storage folder.  

Note: In the controller, the favorite functions may appear in red (as warnings), but they work perfectly fine.  

images in storage/app/public/images
