Usage: 
- `docker compose up -d`
- `npm run build`

You should now be able to access `localhost:8080/products`

---

I ran out of time, so there's a few points to mention: 

The frontend was the last thing I worked on, so the styling is incomplete
This causes a few issues the input fields being invisible on the create and edit pages, or the table not aligning its header with the rows

For expediency, I've opted to generate some dummy data in the `create_brand_table` migration instead of making a Seeder.

I wasn't able to do more than one controller - the ProductController.
Hopefully the intent is clear when you look at how I've set up certain components to match the additional demands in the case.
