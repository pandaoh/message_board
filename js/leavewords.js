var code;



/**
 * 生成验证码
 */
function createCode() {
  code = "";
  var codeLength = 4;                                                           //验证码的长度
  var checkCode = document.querySelector("#codes");
  var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '贺');  //所有候选组成验证码的字符，可以用中文。
  for (var i = 0; i < codeLength; i++) {
    var charNum = Math.floor(Math.random() * 52);
    code += codeChars[charNum];
  }
  if (checkCode) {
    checkCode.className = "code";
    checkCode.innerHTML = code;
  }
}



/**
 * 验证表单
 * @returns {boolean} 是否提交表单 
 */
var success = null;
function validateCode() {
//  clearTimeout(success);
//  document.querySelector(".success-info").innerHTML("");
  var inputCode = document.querySelector(".code-input").value;
  if (inputCode.length <= 0) {
    alert("验证码不能为空！");
    return false;
  } else if (inputCode.toUpperCase() !== code.toUpperCase()) {
    alert("验证码输入有误！");
    createCode();
    return false;
  } else {
    var contentText = document.querySelector("textarea[name='content']").value;
    var userText = document.querySelector("input[name='user']").value;
    contentText = contentText.replace(/^\s+|\s+$/g, "");
    userText = userText.replace(/^\s+|\s+$/g, "");
    if (contentText.length <= 0 || userText.length <= 0) {
      alert("留言内容或者留言人不能为空！");
      return false;
    }
//    else {
//      document.querySelector(".success-info").innerHTML("留言成功√");
//      success = setTimeout(function () {
//        document.querySelector(".success-info").innerHTML("");
//      }, 3000);
//    }
  }
}
