
var awsmDialog = (function(){
  function $(selector){
    return document.querySelector(selector);
  }

  function create(tag, cl, txt ){
    var el = document.createElement('div');
    el.className = cl;
            
    if(txt){
      var newContent = document.createTextNode(txt);
      el.appendChild(newContent);
    }
    return el;
  }
  var   defOKText = "Yes",
        defCancelText="No",
        dialog = $('.awsm-dialog'),
        okCallback = null,
        cancelCallback = null;

  function init(){
    if(dialog) return;

    dialog = create('div', 'awsm-dialog');

    var divContent = create('div', 'awd-content');

    dialog.appendChild(divContent);

    var pMessage = create('p', 'awd-message', 'Are you sure?');
    divContent.appendChild(pMessage);
            
    var pInput = create('p', 'awd-input', 'Edit Me');
    
    divContent.appendChild(pInput);
   
    var btnOk = create('button', 'btn awd-ok', defOKText);

    divContent.appendChild(btnOk);
    
    var btnCancel = create('button', 'btn awd-cancel', defCancelText);
 
    document.querySelector('body').append(dialog);
  }
  
  function open(message,editMe,selectMe){
    init();
    
    okCallback     = null;
    cancelCallback = null;
    var pMessage   = $('.awd-message'),
        pInput     = $('.awd-input'),
        okBtn      = $('.awd-ok'),
        cancelBtn  = $('.awd-cancel');
    
    pMessage.innerText = message;  
    if (editMe) {
        pInput.innerText = editMe;
        pInput.contentEditable = true;
        pInput.style.display = "block";
        
        pInput.onkeydown = function (e) {
           
            if (!e) {
                e = window.event;
            }
            var keyCode = e.which || e.keyCode,
                target  = e.target || e.srcElement;
        
            if (keyCode === 13 && !e.shiftKey) {
                
                if (e.preventDefault) {
                    e.preventDefault();
                } else {
                    e.returnValue = false;
                }
                okBtn.onclick(); 
            }
            
            if (keyCode === 27 ) {
                
                if (e.preventDefault) {
                    e.preventDefault();
                } else {
                    e.returnValue = false;
                }
                cancelBtn.onclick(); 
            }
        };

        setTimeout(function() {
            pInput.focus();
            pInput.spellcheck = false;
            if (selectMe===undefined || editMe.lastIndexOf(selectMe)<0) {
                document.execCommand("SelectAll",false);
                
            } else {
                var textNode = pInput.childNodes[0]; //text node is the first child node of a span
                
                var r = document.createRange();
                var startIndex = editMe.lastIndexOf(selectMe);
                var endIndex = startIndex+selectMe.length;
                r.setStart(textNode, startIndex);
                r.setEnd(textNode, endIndex);
                
                var s = window.getSelection();
                s.removeAllRanges();
                s.addRange(r);
            }                
            
            
        }, 0);
         
    } else {    
           pInput.style.display = "none";
    }
    show();
    return this;
  }
  
  function show(){
     dialog.style.display = 'block';
        ok();
        cancel();
  }
  
  function ok(okText,callback,immediate){
    
    var pInput = $('.awd-input'),
        okBtn = $('.awd-ok');
    
    
    if (typeof okText==='string') {
         okBtn.innerHTML=okText;
         okCallback = callback;
    } else {
       okCallback = okText;
        immediate = callback;
    }


   okBtn.onclick = function(ev){
        if (typeof immediate==='function') {
              immediate(pInput.innerText);
        }  
        hide(okCallback,pInput.innerText);
   };

   return this;
  }

  function cancel(cancelText,callback,immediate){
        var pInput = $('.awd-input'),
            cancelBtn = $('.awd-cancel');
        
         if (typeof cancelText==='string') {
              cancelBtn.innerHTML=cancelText;
              cancelCallback = callback;
        } else {
              cancelCallback = cancelText;
              immediate = callback; 
        }
        
        if (cancelCallback) {
            cancelBtn.style.display="inline-block";
            
            cancelBtn.onclick = function(ev){
                if (typeof immediate==='function') {
                    immediate(pInput.innerText);
                } 
                hide(cancelCallback,pInput.innerText);
                
            }
            
        } else {
            cancelBtn.style.display="none";
        }
  }
  
  function hide(cb,cbValue){
    dialog.className = 'awsm-dialog animated zoomOutDown';
   
    setTimeout(function(){
        dialog.style.display = 'none';
        dialog.className = 'awsm-dialog animated zoomInUp';
        
        var pInput = $('.awd-input'),
            okBtn = $('.awd-ok'),
            cancelBtn = $('.awd-cancel');
            okBtn.innerHTML=defOKText;
            cancelBtn.style.display="inline-block";
            pInput.style.display="none";
            cancelBtn.innerHTML=defCancelText;
            if (typeof cb==='function') cb(cbValue);
              
    }, 1000);
  }
  
  return {
    open,
    ok,
    cancel
  };
  
})();

var btn = document.querySelector('.btn-dialog');

btn.addEventListener('click', function(ev){
ev.preventDefault();

awsmDialog.open('Are you sure you want to do this?');
awsmDialog.ok(function(){
   btn.style.background = "red";
   awsmDialog.open('You said YES.','Edit This!');
   awsmDialog.ok("OK",function(){});
   awsmDialog.cancel(false);
},
function(){
     btn.style.background = "lime";
});
awsmDialog.cancel(function(){
   awsmDialog.open('You Said NO.');
   awsmDialog.ok("OK",function(){});
   awsmDialog.cancel(false);
   btn.style.background = "red";
},
function(){
     btn.style.background = "blue";
});
})


// for creating preview screenshot

var btnOk = document.querySelector('.awd-ok');

function demo(){


setInterval(function(){
btn.click()
}, 1000);

setInterval(function(){
  btnOk.click();
}, 3000);
}

if (document.location.pathname.indexOf('fullcpgrid')>-1){
demo();
}