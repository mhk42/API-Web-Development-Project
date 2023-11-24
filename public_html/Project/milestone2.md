<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 API Project</td></tr>
<tr><td> <em>Student: </em> Muhammad Khan (mhk42)</td></tr>
<tr><td> <em>Generated: </em> 11/24/2023 3:55:46 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-2-api-project/grade/mhk42" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Define the appropriate table or tables for your API </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of the table definition SQL files</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T18.30.48sql_table.png.webp?alt=media&token=89560ef2-e1c9-4e54-afc3-68d41a4055cf"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing the Dogs table designed to store information about individual dogs, including id,<br>user_id(to map the dog to each specific user), dog name, breed name, hp<br>attack defense(generated randomly), and image url(to display the dog image). <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Mappings</td></tr>
<tr><td> <em>Response:</em> <div><div>Dogs Table -&nbsp;</div><div>i. The column are id, user_id, name, breed_name, hp, attack, defense,<br>image_url, created, and modified</div><div>i. The user_id is attached to each Dog to make<br>sure that each user’s list of Dogs are unique and different from each<br>other.</div><div>i. breed_name will be automatically be mapped from the API, whenever the dog<br>is displayed, it’s breed_name will be displayed also</div><div>i. hp, attack, defense, are randomly<br>generated through code for each dog</div><div>i. image_url will be mapped from the API,<br>this way whenever the user’s dog appears, the image of the dog will<br>be there also.</div></div><div><br></div><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/40">https://github.com/mhk42/IT202-007/pull/40</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Data Creation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of the Page and the Code (at least two)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.07.091.1a.png.webp?alt=media&token=bdb6a637-5d30-460e-9a22-47512478b374"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for the data creation page #1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.07.231.1b.png.webp?alt=media&token=4b231a19-147b-4bfd-8f9e-33beeb43db8a"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page for the data creation page with valid data before submission (data<br>creation page #1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.07.431.1c.png.webp?alt=media&token=121c624e-934e-4a56-8e80-70b345fb67f2"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing successful data creation message <br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.08.031.1d.png.webp?alt=media&token=57a5b331-c408-4829-871d-c3e6a6621bd6"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing error in an unsuccessful data creation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.36.53battle.png.webp?alt=media&token=d609e54d-a2b6-488a-883e-74bff56634e5"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for the data creation page #2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.38.33batttle_success.png.webp?alt=media&token=a9a8a950-0abb-4db1-887a-bde0931236aa"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing page for the data creation(data creation page #2) when the user wins<br>their battle<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Database Results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.09.132.1a.png.webp?alt=media&token=1d43f9e8-4b02-4a5d-8bef-a32d128b0235"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing database result after successful creation(manual data is the name entered by the<br>user, the breed_name, and image_url are from the API, the stats for the<br>dog are randomly generated).<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Misc Checklist</td></tr>
<tr><td> <em>Response:</em> <p>What makes each dog entity unique are its stats(hp, attack, defense), and the<br>dog name which is chosen by the user. The user can not name<br>two dogs the same name, therefore, if he/she tries to, then a friendly-error<br>message will appear saying that the name is already taken by another dog<br>of theirs. This will take care of the duplicate entered data by the<br>user. The only duplicate items from the API can be the breed_name, and<br>this does not really affect the database since each dog is identified by<br>a unique name by the user, along with a unique ID. Lastly, Any<br>user on the site has the access to create the dogs.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/Dogemon.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/Dogemon.php</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/41, https://github.com/mhk42/IT202-007/pull/55">https://github.com/mhk42/IT202-007/pull/41, https://github.com/mhk42/IT202-007/pull/55</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Data List Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot the list page and code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.44.33data_list_code.png.webp?alt=media&token=4dde56ca-ab3e-40b8-9dcb-269764448609"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for the data list page that displays the summarized view of<br>manually and api generated data<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.46.30data_list_age.png.webp?alt=media&token=5d92ec29-118b-4a99-8810-2f036f210ea6"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing data list page with both manual and API-generated data with filterting/sorting feature(the<br>server-side default value is set to 10)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.48.48no_results.png.webp?alt=media&token=106ffbb8-1f05-4185-9646-a33963d4de65"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing example with no results found with the filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.49.42filter_2.png.webp?alt=media&token=d0545aeb-b415-43e1-bc8e-639d20c4c6b7"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing example of filtering 2 dogs<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T19.54.52filter_code.png.webp?alt=media&token=c189a8c0-82ab-4d45-93d5-6ab0e18d979e"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing a snippet of the filtering code<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Any logged in user has access to this page since it is the<br>home page. Each home page of each user will be unique since they<br>will all have different dogs. Any user can view, edit, and delete their<br>dog if they want to. The data list page shows the current collection<br>of the dogs that the user has. The user can view in details,<br>edit, delete, or use them for battle by clicking either of the buttons.<br>The filtering can be either be done through displaying a specific number of<br>dogs on the page, or you can manually enter a name to filter<br>to find a specific dog.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/home.php">https://mhk42-prod-836446910f6a.herokuapp.com/Project/home.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/42">https://github.com/mhk42/IT202-007/pull/42</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> View Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of Page and related content/code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.03.51details_code.png.webp?alt=media&token=ce3f7bf7-1aa2-4f89-88b0-b18ef88809b8"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for displaying the dog in details<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.04.29details_age.png.webp?alt=media&token=bd8eaa3e-a074-4cd7-9391-ec0d1d51fb9e"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing details page of a specific dog<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.05.12invalid_id.png.webp?alt=media&token=058f35ff-5261-4ba5-ae2c-0577bb0375f2"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing invalid id result(redirecting back to the home page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Any user on the website each view their dog in details, and edit,<br>or delete them. The extra details in the page will include the breed<br>name, and the dog&#39;s stats, such as hp, attack, and defense.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/details.php?dog_id=2">https://mhk42-prod-836446910f6a.herokuapp.com/Project/details.php?dog_id=2</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/43">https://github.com/mhk42/IT202-007/pull/43</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Edit Data Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of Page and related content/code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.13.04edit_code.png.webp?alt=media&token=2d32feef-f8f0-484f-8649-dd956c50a904"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for the edit page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.13.38edit_page.png.webp?alt=media&token=e7ffe16c-13ff-48e3-9131-18369ce7e600"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing edit page with a specific dog<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.15.26name_change.png.webp?alt=media&token=a7eef3a8-90bc-43d7-bdf5-de2cd64c94f8"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing successful update with the updated data shown.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.16.20invalid_id.png.webp?alt=media&token=f71ea718-0a01-4b0b-90e4-fadfa31be1a0"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing invalid id result(redirecting back to the home page)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.17.01name_taken.png.webp?alt=media&token=d5f77513-99aa-42e5-9e92-99d17d89d317"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing error message when a user tries to rename their dog to the<br>same name of another dog that they already own<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://mhk42-prod-836446910f6a.herokuapp.com/Project/edit.php?dog_id=2">https://mhk42-prod-836446910f6a.herokuapp.com/Project/edit.php?dog_id=2</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/46">https://github.com/mhk42/IT202-007/pull/46</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Delete Handling </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of related code/evidence</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.20.47delete_code.png.webp?alt=media&token=80dfd90a-4b9d-40b9-9d5c-6c518e02eaa3"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing code for deleting<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.21.27successful_delete.png.webp?alt=media&token=36f01ccf-15ee-4fd7-9db5-43bd23529156"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing flash message after successful deletion of a dog<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.23.40error.png.webp?alt=media&token=6ad1641c-0c19-425b-b07a-ffd0c5892a0e"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing flash message after a unsuccessful deletion<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.25.05part_1.png.webp?alt=media&token=e5f5c183-4727-4bf4-81a7-36614057bd68"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing deleting with an active filter part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.25.36part_2.png.webp?alt=media&token=b2ffaa90-1323-4214-ac92-f285b7c3b503"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing deleting with an active filter part 2(the filter was reapplied and a<br>new dog took place of the deleted dog)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Any user can delete their own collected dogs.&nbsp;The code performs a hard delete<br>by directly executing a SQL DELETE statement to remove a dog record from<br>the &quot;Dogs&quot; table based on the submitted form data. After a delete action,<br>the code redirects the user back to the list page while preserving sort<br>and filter data. The filter parameters, stored in session variables ($_SESSION), are included<br>in the redirect URL as query parameters. Upon reloading the list page, these<br>parameters are retrieved from the URL to maintain the user&#39;s previously applied filters<br>and sorting preferences.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/47">https://github.com/mhk42/IT202-007/pull/47</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> API Handling </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of Code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.32.48api_fetch.png.webp?alt=media&token=346310cc-ff4d-44cb-a337-e49570399f6e"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing how the API data is fetched from the server side<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.35.23mapping.png.webp?alt=media&token=5c34723b-9f3d-4ab2-bc66-8e727621c0cf"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing how API data is mapped to the table, and how duplicate data<br>is handled<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Data from an API is mapped to a database table named &quot;Dogs.&quot; The<br>API data, received through a POST request, includes information such as dog name,<br>breed, attributes (hp, attack, defense), image URL, and the user ID. The code<br>ensures that duplicate entries are not inserted into the table by checking the<br>existence of a dog with the same name for the given user before<br>performing the database insertion, and if a duplicate is found, an error message<br>is displayed; otherwise, the new dog data is inserted into the Dogs table.<br>API calls are triggered manually by the user. When the user first logs<br>in, they collect their first dog, this is the first trigger that they<br>attempt. The other triggers are manually triggered by the user when the user<br>wants to collect more dogs. I am making a website where you can<br>collect dogs like Pokemon, so the dog breed names and images from the<br>API are used to add more detail and appeal to the website. The<br>rest of the content is user/code generated.&nbsp;<div><br></div><div>Originally I wanted to do something with<br>movies, but I scratched that idea since I found this to be more<br>unique and fun.&nbsp;</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/mhk42/IT202-007/pull/41, https://github.com/mhk42/IT202-007/pull/55">https://github.com/mhk42/IT202-007/pull/41, https://github.com/mhk42/IT202-007/pull/55</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What issues did you face and overcome during this milestone?</td></tr>
<tr><td> <em>Response:</em> <p>Originally, I was planning on doing a movies list, using a movie API.<br>This kind of lacked creativity in my opinion, and it was hard to<br>integrate it into the code when the API itself was confusing for me.<br>I decided to go for a more simpler yet more creative route instead<br>using a simple dog API to fetch dog information that I can use.<br>Since I liked Pokémon, I decided why not create a website that&#39;s similar<br>to it using the API. However, coding it was not easy, as it<br>did involve a lot of thought, but through multiple attempts I think I<br>was able to code a simple yet effective site.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> What did you find the easiest?</td></tr>
<tr><td> <em>Response:</em> <p>What I found the easiest was the process of deleting data from the<br>database using PHP. The code snippet efficiently retrieves the dog ID from the<br>form data, prepares a SQL statement to delete the corresponding record, and handles<br>success or failure with clear flash messages. The simplicity of the implementation, coupled<br>with the use of PDO for secure database interactions, made the deletion task<br>straightforward and easy to comprehend.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> What did you find the hardest?</td></tr>
<tr><td> <em>Response:</em> <p>What I found the hardest was the process of integrating data obtained from<br>an external API into the local database. The code fetches a random dog&#39;s<br>details, including its image and breed, from an external API and dynamically displays<br>it alongside local database records with manually entered data. Mapping and synchronizing these<br>data sources while ensuring consistency in the application was a challenge that went<br>through a lot of trial and error.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Did you have to utilize any unanticipated APIs?</td></tr>
<tr><td> <em>Response:</em> <p>No, the only API I used was the dog api that I set<br>out to use in the first place.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot of your project board</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fmhk42%2F2023-11-24T20.52.42project_board.png.webp?alt=media&token=53177fe0-2add-4bc8-b4be-af9c027d4690"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing project board with completed tasks<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-2-api-project/grade/mhk42" target="_blank">Grading</a></td></tr></table>