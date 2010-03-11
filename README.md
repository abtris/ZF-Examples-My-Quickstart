1. Create structure

   zf create project

2. Enable layout

   zf enable layout

3. Create Controllers (index, auth, post)

   zf create controller auth 1
   zf create action login auth 1
   zf create action logout auth 1

   zf create controller post 1
   zf create action add post 1
   zf create action edit post 1
   zf create action delete post 1

   zf create controller comment 1
   zf create action add comment 1
   zf create action reply comment 1
   zf create action edit comment 1
   zf create action delete comment 1
