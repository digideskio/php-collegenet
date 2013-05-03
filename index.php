<?php 
session_start(); 
if($_SESSION['logged']){ 
    include("menuLogged.php");
}
else {
    include("menu.php");
}  
?>
		      <h1><span class="off">Welcome to College Connect</span></h1>
                    <table cellpadding="10">
                         <tr>
                             <td colspan="2"><img src="static/images/mainpage_header.jpg" /></td>
                         </tr>
                         <tr>
                             <th><h1>Recent News</h1></th>
                             <th><h1>News Articles</h1></th>
                         </tr>
                         <tr>
                             <td>
                                 <div id="recentnews">
                                 <script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script> <!--Twitter widget -->
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 3,
  interval: 3000,
  width: 260,
  height: 200,
  theme: {
    shell: {
      background: '#0066CC',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#000000',
      links: '#003399'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'default'
  }
}).render().setUser('NEIUCS').start();
</script>
                                 </div>
                             </td>
                             <td> 
                                 <div id="recentnews">
                                 <h3>College Wins Nationals!</h3>
                                 <i>Posted on 3/31/13 8:00AM</i>
                                 <br/>
                                 <p>
                                 This past weekend your College team won the national competition in<br/>
                                 some sport! It was a great...<a href="#">Read More</a>  
                                 </p>
				     <br/>
                                 <hr>
                                 <br/>
                                 <h3>New Scholarship Posted</h3>
                                 <i>Posted on 3/28/13 8:00AM</i>
                                 <br/>
                                 <p>
                                 We added a new and exciting opportunity for all students. This new<br/>
                                 scholarships is very...<a href="#">Read More</a>   
                                 </p>
                                 <br/>
                                 <hr>
                                 <br/>
                                 <h3>New Website Design!</h3>
                                 <i>Posted on 3/23/13 8:00AM</i>
                                 <br/>
                                 <p>
                                 Welcome to the new website! Your college experience just became easier<br/>
                                 to manage. You can now...<a href="#">Read More</a><br/>   
                                 </p>
                                 </div>
                             </td>
                         </tr>
                    </table>
                <br>
            </div>

            <div id="content_bottom"></div>
        </div>

    </div>
</body>
</html>
