1. Create structure

	`zf create project`

2. Enable layout

	`zf enable layout`

3. Create Controllers (index, auth, post)

	`zf create controller auth 1`
	
	`zf create action login auth 1`
	
	`zf create action logout auth 1`

	`zf create controller post 1`
	
	`zf create action add post 1`
	
	`zf create action edit post 1`
	
	`zf create action delete post 1`

	`zf create controller comment 1`
	
	`zf create action add comment 1`
	
	`zf create action reply comment 1`
	
	`zf create action edit comment 1`
	
	`zf create action delete comment 1`

4. SetUp Database connection (pgsql, mysql)

	run sql script docs/createTables.sql
	
	`$ mysql -u root -p <createTables.sql`

5. Create Models (user, post, comment)

	`zf create db-table.from-database`

	add models methods

6. Create Forms (login, post, comment)

	`zf create form login`
	
	`zf create form post`
	
	`zf create form comment`

7. Auth (Zend_Auth_Adapter_DbTable)

    $adapter = new Zend_Auth_Adapter_DbTable(
    $db,
    'users',
    'email',
    'password',
    'SHA1(?)'
    );


8. Log (Zend_Log, Firebug)

    `resources.log.fb.writerName = "Firebug"`
    
    `resources.log.fb.writerParams.firebug`