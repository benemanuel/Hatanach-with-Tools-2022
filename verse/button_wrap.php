<?php
function button_wrap($hebcit,$pasuk,$url,$engcit){
    //    print_r(array($pasuk,$url,$hebcit,$engcit));
?>
       <button data-clipboard-text="<?php echo $hebcit; ?>">???????? ????????</button>
       <button data-clipboard-text="<?php echo $pasuk; ?>">??????????</button>
       <button data-clipboard-text="<?php echo $url; ?>">??????????</button>
       <button data-clipboard-text="<?php echo $pasuk. $hebcit; ?>">?????????? ????????????</button>
       <button data-clipboard-text="<?php echo $engcit; ?>">Citation</button>



    <script src="script/citapp.js"> </script>
    <script src="script/clipboard.min.js"></script>

    <!-- 3. Instantiate clipboard by passing a list of HTML elements -->
    <script>
      var btns = document.querySelectorAll('button');
      var clipboard = new ClipboardJS(btns);

      clipboard.on('success', function (e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
      });
      clipboard.on('error', function (e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
      });
    </script>

<?php
}




