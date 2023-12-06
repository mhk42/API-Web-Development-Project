<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 API Project</td></tr>
<tr><td> <em>Student: </em> Muhammad Khan (mhk42)</td></tr>
<tr><td> <em>Generated: </em> 12/6/2023 4:31:21 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-3-api-project/grade/mhk42" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes just to be up to date</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> API Data Association </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Consider how your API data will be associated with a user</td></tr>
<tr><td> <em>Response:</em> <p>The API data is already associated with the user as a collection of<br>entities as shown in Milestone 2, but will be further associated with a<br>list of favorites. The user can favorite whatever entities they want, and unfavorite<br>them later on if they want. When favorited, it updates the database, with<br>either a true or false for that specific entity to represent whether or<br>not the entity is favorited or not. To view favorite entities, the user<br>has to click the &quot;Favorites&quot; on the navigation bar.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Handling Data Changes</td></tr>
<tr><td> <em>Response:</em> <p>When the entity is updated manually, the user sees the new version of<br>the data.&nbsp;When a user clicks the &quot;Save as Favorite&quot; button for a Dog,<br>the server processes the request, updates the database by setting the is_favorite column<br>to 1 for the selected Doge, and triggers a successful flash message. The<br>server then instructs the client&#39;s browser to reload the current page. Upon reloading,<br>the PHP code retrieves the updated data from the database, including the new<br>favorite status, and renders the Dog card with the visual change, reflecting that<br>the Dog is now marked as a favorite.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Handle the association of data to a user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Which option did you need to do to handle the association of data?</td></tr>
<tr><td> <em>Response:</em> <p>I chose &quot;&quot;<span style="font-size: 13px;">(Option 1) Update the necessary Pages to include the<br>ability to associate the data with a User Note: This is like favorites,<br>shopping cart, wishlist, etc&quot;.</span><br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots of the updated/created pages related to associating data with the user (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.07.15home_page.png.webp?alt=media&token=50704996-da0b-47dd-83fc-af5f1c77b67d"/></td></tr>
<tr><td> <em>Caption:</em> <p>New button is added for each dog card(the &quot;save as favorite&quot; button), this<br>further associates the data with the user.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.09.31favorite.png.webp?alt=media&token=65eaf790-9162-4973-b2fa-035bb0bbd18e"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens after a user favorites a dog(the page is automatically updated<br>with the new data)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.15.49code%20snippet%201.png.webp?alt=media&token=559d7c39-5e51-4dd8-b326-7edf8c4c9fa6"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet #1 for the favorite/unfavorite function <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.16.11code%20snippet%202.png.webp?alt=media&token=338e8f52-e84c-482a-a42d-35eefb3c81b2"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet #2 for the favorite/unfavorite function <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Include any Heroku prod links to pages that would trigger entity to user association</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/home.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/home.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/63">https://github.com/mhk42/IT202-007/pull/63</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Logged in user’s associated entities page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What is the data that's associated with the user?</td></tr>
<tr><td> <em>Response:</em> <p>The data associated with the user includes information related to their favorite &quot;Dogs&quot;.&nbsp;<br>This information is stored in a database table named &quot;Dogs&quot; and includes details<br>such as dog ID, user ID, dog name, and an image of the<br>Dog that gets retrieved from an URL.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show screenshots of the logged in user's entities associated with them  (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.50.18favorite%20page.png.webp?alt=media&token=25f3c1ec-0452-4cdb-bde9-edef0978a40d"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing association(favorite) page, along with many other features. This includes a details button,<br>a remove button to remove the association as a favorite, a &quot;remove all<br>favorites&quot; button to remove all associations, along with the heading of the page<br>showing total count of items associated to this user with &amp; without filters.<br><br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.50.51applied%20filter.png.webp?alt=media&token=b0dbe7e8-d5b1-4a33-8199-185fbee6a3d3"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page with an applied filter to demonstrate that the value changes based<br>on a number filter, along with the amount of displayed dogs. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.53.13filter%202.png.webp?alt=media&token=62a1c810-be5a-48eb-8c9d-8a2a21d83141"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page with an applied filter to demonstrate that the value changes based<br>on a name filter, along with the amount of displayed dogs. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.54.11no%20results.png.webp?alt=media&token=a20ad86e-a35e-442d-a496-b10ebad2bd9e"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens when there are no results when using the name filter.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.55.13remove%20function.png.webp?alt=media&token=2a1e216c-bd95-4367-93b8-99077edfbda1"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens when you remove a dog as a favorite<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T19.58.22code%20snippet%201.png.webp?alt=media&token=1e099600-ea89-4a53-825a-8c9c604a414b"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet for the remove and remove all associations functions <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.01.01code%20snippet%202.png.webp?alt=media&token=d2a07950-98a0-4b2d-8c9b-81ba43c69727"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet for the filtering logic<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.03.07code%20snippet%203.png.webp?alt=media&token=3a30a8f5-3384-4076-823a-6a2836bec5f6"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet for displaying favorite dogs<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add Heroku Prod links to the page(s) where the logged in user has their entities listed</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/favorites.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/favorites.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/64">https://github.com/mhk42/IT202-007/pull/64</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> All Users association page (Note: This will likely be an admin page and is not the same as the previous item) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe/Explain the purpose of this page from your project perspective</td></tr>
<tr><td> <em>Response:</em> <p>This serves as an administrative dashboard for managing dogs where you can utilize<br>this page to efficiently view and manipulate records of dogs owned by various<br>users. The page facilitates tasks such as filtering dogs based on owner username,<br>limiting the displayed records, and removing individual dogs or all dogs associated with<br>a specific user. When you remove the association, it basically makes it so<br>that specific user no longer owns the dog, but the dog is not<br>deleted from the database.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show screenshots of the entity data associated with many users (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.10.00associations%20page.png.webp?alt=media&token=bbfe1a47-bba9-495b-ab68-7e4e59644964"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing admin page to show multiple associations between entities and many users. This<br>shows brief overview of each dog, along with a details button, and the<br>name of the user that owns the dog. The heading of the page<br>also includes total count of items associated with users with and without filters.<br><br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.15.29applied%20filter.png.webp?alt=media&token=9e72019b-f93b-45a3-b875-035111d2870a"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens when you filter by a username. It displays all of<br>the dogs the filtered username owns, and new button appears, named &quot;Remove All<br>Dogs&quot; to remove all of the associations related to that specific user. This<br>also shows the total amount of dogs associated with this user at the<br>top. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.16.52no%20results.png.webp?alt=media&token=9c2cf4ee-d9a0-4eb5-a438-e0eff2191766"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens when you enter a name that currently doesn&#39;t have any<br>associations.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.18.33user.png.webp?alt=media&token=69449c24-5e8c-4528-8038-e5ef59c885e6"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens when you click the highlighted username on the association page.<br>It redirects you to the user&#39;s profile with relevant information relating to that<br>specific user. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.23.09code%20snippet%20%231.png.webp?alt=media&token=a6ec2c12-dccd-4e41-a7d0-c8d91ce7571a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing code snippet for counting dogs and removing dogs<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.25.22code%20snippet%203.png.webp?alt=media&token=b4cac940-8df3-4258-a533-75e0ac7065ec"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet for the remove all dogs function for a specific filtered<br>user<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.28.29code%20snippet%202.png.webp?alt=media&token=cdbcbc51-fc41-4fe0-ba6f-50a574158baa"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing code snippet for displaying dogs<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.35.41code%20snippet%204.png.webp?alt=media&token=d995055d-df59-4812-8603-6549423971ad"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for retrieving and displaying Dogs with filters<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add Heroku Prod links to the page(s) where entities associated to many users can be seen</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/admin/association_page.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/admin/association_page.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/65">https://github.com/mhk42/IT202-007/pull/65</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Create a page that shows data not associated with any user (Note: This will likely be an admin page and is not the same as the previous item) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show screenshots of the page showing entities not associated with anyone (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.37.16no%20associations.png.webp?alt=media&token=37e57b7b-b84b-4f4d-b2b3-5257b788dc18"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page for the dogs with summarized relevant information that currently don&#39;t have<br>any associations. This also includes the details page button, along with a heading<br>that shows the total count of items not associated to anyone with and<br>without filters. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.38.59filter%201.png.webp?alt=media&token=a5c4f214-6c13-40c2-9c0a-18d6e65c04ca"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page with an applied filter to demonstrate that the value changes based<br>on a number filter, along with the amount of displayed dogs. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.40.53filter%202.png.webp?alt=media&token=29132579-d493-4d25-96cd-f9d6d6fca725"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page with an applied filter to demonstrate that the value changes based<br>on a name filter, along with the amount of displayed dogs. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.41.43no%20results.png.webp?alt=media&token=01871221-c67f-4180-a3df-a920ff7a3ab2"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens when you search for a dog that does not exist<br>or without an owner.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.44.23code%20snippet%201.png.webp?alt=media&token=012a339c-693f-48ec-8034-2e2ae21b3787"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing code snippet for fetching and displaying ownerless dogs, along with filtering logic.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.46.38code%20snippet%202.png.webp?alt=media&token=28953f31-57ae-48eb-bb08-77745b909bab"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing code snippet for displaying ownerless dogs<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add Heroku Prod links to the page(s) where unassociated entities can be seen</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/admin/no_association_page.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/admin/no_association_page.php</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/66">https://github.com/mhk42/IT202-007/pull/66</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Admin can associate any entity with any users (Note: This may be a form on an existing association page if you rather not have a separate page for this) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing evidence of the checklist items (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.48.36page%201.png.webp?alt=media&token=7e1829bd-be20-4798-a85e-3799e75b5ac3"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing &quot;Assign Associations Page&quot; with a form with two fields Entity identifier fields.<br>1 for the username, and the other for the dog name.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.51.49partially%20matched%20user.png.webp?alt=media&token=6c92eaa6-df97-4ed7-bcb6-4df370e8c726"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page when admin enters a partially matched username<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.52.19partially%20matched%20dog.png.webp?alt=media&token=4e5c1c9b-ab54-43fc-bd66-69f62b0b92c9"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page when admin enters a partially matched dog name<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.54.38before.png.webp?alt=media&token=b1b6441b-c2de-4636-b197-4a6b927e13b4"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing database before associations are applied(user_id 10 is muhammad). Applying Associations Part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.55.58applied%20assocications%20part%201.png.webp?alt=media&token=e78880f2-884e-43f9-b107-68c93030c95d"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing the dogs that will be removed/associated with the user muhammad. Applying Associations<br>Part 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.56.48part%202.png.webp?alt=media&token=159a692d-7656-4f82-ae4b-24a13abab62f"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing what happens after clicking apply associations and it is successful . Applying<br>Associations Part 3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.57.19part%203.png.webp?alt=media&token=6dd441d2-e88f-4973-8e88-d069297dfe74"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing database after successfully associating/removing associations. The dog in row 1 that was<br>previously already associated is no longer associated with the user, and the dogs<br>that were not associated are now associated with the user.  Applying Associations<br>Part 4<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T20.59.54code%20snippet%201.png.webp?alt=media&token=228ac1d8-dd13-4a7b-a284-9a30fc399d9d"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code snippet for updating associations between dogs and users <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T21.01.42code%20snippet%202.png.webp?alt=media&token=70cc03ca-d7a7-4556-abb6-b90f4de78047"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing code snippet for handling a PHP POST request to search for dogs<br>and users in a database<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-12-06T21.03.55code%20snippet%203.png.webp?alt=media&token=575df42a-54dc-4fe7-98fa-1feb01aa61f3"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing code snippet for a form allowing users to search for dogs and<br>users by entity identifier and username<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain the code logic for this page</td></tr>
<tr><td> <em>Response:</em> <p>When the form with &quot;Entity Identifier&quot; and &quot;Username&quot; fields are submitted, it is<br>initiating a search in the database for partially matched dogs and users. The<br>search results, limited to a maximum of 25 entries each, are displayed in<br>two separate columns, presented in tables on the page. Checkboxes next to each<br>entity and user facilitate selection. Upon clicking the &quot;Apply Associations&quot; button, a POST<br>request triggers association logic, executing a prepared SQL statement within nested loops for<br>selected combinations of entities and users. The SQL statement utilizes a CASE statement<br>to dynamically set or remove associations based on the current relationship status.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add Heroku Prod links to the page(s) related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/admin/assign_associations.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/admin/assign_associations.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/67">https://github.com/mhk42/IT202-007/pull/67</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Reflection </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Document any issues/struggles</td></tr>
<tr><td> <em>Response:</em> <p>I initially faced challenges understanding the database interactions and the flow of data<br>between the frontend and backend. The code structure seemed a bit complex, especially<br>with the multiple POST requests and the handling of partially matched entities and<br>users. To overcome this, I first focused on understanding the core functions, such<br>as how the database queries were structured and how the results were processed<br>and displayed.&nbsp;Another struggle was comprehending the nested loops within the association logic. It<br>took some time to dissect how each loop iterated over the selected entities<br>and users and how the SQL statement was dynamically executed. Seeking assistance from<br>online resources and breaking down the code step by step helped me grasp<br>the logic behind the nested loops and the conditional SQL statements.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Highlight any favorite topics</td></tr>
<tr><td> <em>Response:</em> <p>I find the integration of external APIs in web development particularly intriguing. This<br>includes fetching data dynamically from an API which adds an element of unpredictability<br>to the application, making it more enjoyable for users.&nbsp;Using external APIs in web<br>development adds a cool factor by bringing in real-time information, making the app<br>more versatile.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Overall how do you feel you did with the project and meeting requirements</td></tr>
<tr><td> <em>Response:</em> <p>I feel pretty good about the project and meeting the requirements. I successfully<br>integrated external APIs for fetching real-time data, which added a dynamic touch to<br>the application. Something I did on my own, which I showcased in the<br>previous milestone for the &quot;battle&quot; part of the project, was implementing JavaScript logic<br>to simulate random battle outcomes.&nbsp; I also took extra steps to make the<br>project more visually appealing by leveraging Bootstrap for styling, ensuring a clean and<br>responsive design that enhances the overall user interface.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Summarize your experience per the checklist items</td></tr>
<tr><td> <em>Response:</em> <p>When I first entered the class, my development experience was pretty basic. I<br>had some exposure to coding, but nothing too advanced. Now, looking at my<br>current experience, I feel a lot more confident in my development skills. Working<br>on this project has given me practical, hands-on experience, especially with integrating external<br>APIs and using JavaScript for dynamic functionalities.&nbsp;<div><br></div><div>I think the thing I&#39;d do differently<br>is being more &quot;creative&quot;. At the moment the collecting of Dogs, and battling<br>with them is pretty basic. I think I&#39;d research more to learn new<br>methods, features etc, to make the website more fun and appealing to use.<br>overall, I kind of wanted to expand more on the &quot;Battle&quot; part of<br>the website, but at the moment, I am inexperienced with creating a semi<br>to fully functional game.&nbsp;<br><div><br></div><div><br></div></div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-3-api-project/grade/mhk42" target="_blank">Grading</a></td></tr></table>