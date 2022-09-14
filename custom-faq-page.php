<?php
/**
 * Template Name: Custom FAQ Page
 *
 * @version 1.0
 * @author alavi
 *
 *References
	Online Tutorials. (2020). How to create an Accordion using CSS & Javascript [Video]. Retrieved from https://www.youtube.com/watch?v=dPLHi7tsoFU
 *
 */

get_header();
?>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
/* display: flex;
justify-content: center;
align-items: center;
min-height: 100vh; */
max-width: 1000px;
  margin: auto;
}


.custom-faq{
max-width: 800px;
}

.custom-faq .contentBx{
    position: relative;
    margin: 10px 20px;
}

.custom-faq .contentBx .label{
    position: relative;
    padding: 10px;
    background: #FAF9F6;
    color: #7A7A7A;
    cursor: pointer;
}

.custom-faq .contentBx .label::before{
    content:'+';
    position: absolute;
    top: 10%;
    right: 20px;
    transform: translate(-10%); /*to skew element*/
    font-size: 1.5em;

}

.custom-faq .contentBx.active .label::before{
    content: '-';
}

.custom-faq .contentBx .content{
    position: relative;
    padding: 0px;
    background: #fff;
    height: 0;
    overflow: hidden;
    transition: 0.5s;
    overflow-y: auto;

}

.custom-faq .contentBx.active .content{
    height: 400px;
    padding: 10px;
}

h1{
    padding: 50px;
}
</style>

<body>

<div class="custom-faq">
<h1 style="font-size: 40px; text-align:center;">LeadLife FAQ</h1>
    <div class="contentBx">
        <div class="label">How do I enrol into a course?</div>
      <div class="content">
        <p>
        Here at LeadLife, we offer tier based courses to suit you needs. Please check the following instructional video:
			<iframe width="500" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
			</iframe>
        </p>
      </div>
    </div>
    <div class="contentBx">
        <div class="label">List Two</div>
      <div class="content">
        <p>
            This is some content
        </p>
      </div>
    </div>
    <div class="contentBx">
        <div class="label">List three</div>
      <div class="content">
        <p>
            This is some content
        </p>
      </div>
    </div>
    <div class="contentBx">
        <div class="label">List four</div>
      <div class="content">
        <p>
            This is some content
        </p>
      </div>
    </div>
    <div class="contentBx">
        <div class="label">List five</div>
      <div class="content">
        <p>
            This is some content
        </p>
      </div>
    </div>
</div>

<script>
    const divReveal = document.getElementsByClassName('contentBx');

    for (i=0; i<divReveal.length;i++){
        divReveal[i].addEventListener('click', function(){
          this.classList.toggle('active')  
        })
    }
</script>

</body>
<?php 

get_footer(); 

?>