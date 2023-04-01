function calculate() {

  const str_apt = document.getElementById("str-apt").value;
  const int_apt = document.getElementById("int-apt").value;
  const pol_apt = document.getElementById("pol-apt").value;
  const char_apt = document.getElementById("char-apt").value;

  const str_per = document.getElementById("str-per").value;
  const int_per = document.getElementById("int-per").value;
  const pol_per = document.getElementById("pol-per").value;
  const char_per = document.getElementById("char-per").value;

  const fa1_per = document.getElementById("fa1").value;
  const fa2_per = document.getElementById("fa2").value;
  const fa3_per = document.getElementById("fa3").value;
  const xiao_per = document.getElementById("xiao").value;
  const level = document.getElementById("level").value;

  var percent = ((fa1_per + fa2_per + fa3_per) *1) + (xiao_per *1);
  var s_per = (str_per *1);
 
//     console.log(level);

//   console.log(str_apt);
//   console.log(int_apt);
//   console.log(pol_apt);
//   console.log(char_apt);

//   console.log(str_per);
//   console.log(int_per);
//   console.log(pol_per);
//   console.log(char_per);

    if(level == 1){
        var lvstat1 = 10;
        var result = (lvstat1 * str_apt * (percent + s_per));
        console.log(result);
    }


}
