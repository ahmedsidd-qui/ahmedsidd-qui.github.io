document.getElementById("navsection").innerHTML = `
<div class="top-section">
<div class="logo">
  <a href="index.html"><img src="/assets/images/logo.png" alt=""></a>
</div>
<div class="nav-items">
  <ul>
    <li><a href="home.html">home</a></li>
    <li><a href="resume.html">resume</a></li>
    <li><a href="blogs.html">blogs</a></li>
    <li><a href="about.html">about</a></li>
  </ul>
</div>
<div class="navicon"><i class="fa-solid fa-bars fa-lg navicon" style="color: #666666;"></i></div>
</div>
`
document.getElementById("footersection").innerHTML = `
<footer>
<p>&copy; 2024, allaboutahmed</p>
</footer>`
// about.html form
document.getElementById("form").addEventListener("submit", function(event) {
    event.preventDefault();
    location.reload;
    alert("Your form has been submitted successfully!");
  });
  
  