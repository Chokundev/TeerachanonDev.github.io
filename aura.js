function calculate() {
    const str1 = document.getElementById("str-apt").value;
    const str2 = document.getElementById("str-atb").value;

    const int1 = document.getElementById("int-apt").value;
    const int2 = document.getElementById("int-atb").value;

    const pol1 = document.getElementById("pol-apt").value;
    const pol2 = document.getElementById("pol-atb").value;

    const char1 = document.getElementById("char-apt").value;
    const char2 = document.getElementById("char-atb").value;


    const str_per = document.getElementById("str-per").value;
    const int_per = document.getElementById("int-per").value;
    const pol_per = document.getElementById("pol-per").value;
    const char_per = document.getElementById("char-per").value;

    var str_sum = (str1 * 1) + (str2 * 1); //รวมค่าบัฟทักษะและบัฟยา


    var str_result1 = (str_sum * 1) * (str_per * 1); //คำนวณค่าบารมี
    var str_result2 = (str_result1 * 1) / 100;  //แปลงค่าบารมี


    let s1 = fun(str_result2);  //ประกาศตัวแปร
    function fun(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(s1);




    ////////////////////////////////////////////////////////////////////////////////////////////////
    var int_sum = (int1 * 1) + (int2 * 1); //รวมค่าบัฟทักษะและบัฟยา
    var int_result1 = (int_sum * 1) * (int_per * 1); //คำนวณค่าบารมี
    var int_result2 = (int_result1 * 1) / 100;  //แปลงค่าบารมี


    let i1 = int(int_result2);  //ประกาศตัวแปร
    function int(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(i1);


    ////////////////////////////////////////////////////////////////////////////////////////////////
    var pol_sum = (pol1 * 1) + (pol2 * 1); //รวมค่าบัฟทักษะและบัฟยา
    var pol_result1 = (pol_sum * 1) * (pol_per * 1); //คำนวณค่าบารมี
    var pol_result2 = (pol_result1 * 1) / 100;  //แปลงค่าบารมี


    let p1 = pol(pol_result2);  //ประกาศตัวแปร
    function pol(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(p1);


    ////////////////////////////////////////////////////////////////////////////////////////////////
    var char_sum = (char1 * 1) + (char2 * 1); //รวมค่าบัฟทักษะและบัฟยา
    var char_result1 = (char_sum * 1) * (char_per * 1); //คำนวณค่าบารมี
    var char_result2 = (char_result1 * 1) / 100;  //แปลงค่าบารมี


    let c1 = char(char_result2);  //ประกาศตัวแปร
    function char(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(c1);


    var power_sum = (str_result2 * 1) + (int_result2 * 1) + (pol_result2 * 1) + (char_result2 * 1);

    let p_sum = power(power_sum);  //ประกาศตัวแปร
    function power(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(c1);

    document.getElementById("result").innerHTML = 'บารมีรวม : ' + p_sum;


    document.getElementById("s_result").innerHTML = 'ยุทธ : ' + s1;
    document.getElementById("i_result").innerHTML = 'ปัญญา : ' + i1;
    document.getElementById("p_result").innerHTML = 'ปกครอง : ' + p1;
    document.getElementById("c_result").innerHTML = 'สเน่ห์ : ' + c1;

    Swal.fire({

      title: 'คำนวณสำเร็จ !!',
      text: 'คุณได้บารมีรวมทั้งหมด : ' + p_sum,

    })

  }