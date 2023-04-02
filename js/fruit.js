function calculate() {
    const str1 = document.getElementById("str-fruit").value;
    const str2 = document.getElementById("str-elixir").value;
    const str3 = document.getElementById("str-bead").value;
    const str4 = document.getElementById("str-powder").value;
    // console.log(str1);
    // console.log(str2);
    // console.log(str3);
    // console.log(str4);

    const int1 = document.getElementById("int-fruit").value;
    const int2 = document.getElementById("int-elixir").value;
    const int3 = document.getElementById("int-bead").value;
    const int4 = document.getElementById("int-powder").value;
    // console.log(int1);
    // console.log(int2);
    // console.log(int3);
    // console.log(int4);

    const pol1 = document.getElementById("pol-fruit").value;
    const pol2 = document.getElementById("pol-elixir").value;
    const pol3 = document.getElementById("pol-bead").value;
    const pol4 = document.getElementById("pol-powder").value;
    // console.log(pol1);
    // console.log(pol2);
    // console.log(pol3);
    // console.log(pol4);

    const char1 = document.getElementById("char-fruit").value;
    const char2 = document.getElementById("char-elixir").value;
    const char3 = document.getElementById("char-bead").value;
    const char4 = document.getElementById("char-powder").value;
    // console.log(char1);
    // console.log(char2);
    // console.log(char3);
    // console.log(char4);



    const str_per = document.getElementById("str-per").value;
    const int_per = document.getElementById("int-per").value;
    const pol_per = document.getElementById("pol-per").value;
    const char_per = document.getElementById("char-per").value;
    // console.log(str_per);
    // console.log(int_per);
    // console.log(pol_per);
    // console.log(char_per);

    var fruit_str = (str1 * 1) * 5000;
    var elixir_str = (str2 * 1) * 1000;
    var bead_str = (str3 * 1) * 500;
    var powder_str = (str4 * 1) * 100;
    // console.log(fruit_str);
    // console.log(elixir_str);
    // console.log(bead_str);
    // console.log(powder_str);

    var fruit_int = (int1 * 1) * 5000;
    var elixir_int = (int2 * 1) * 1000;
    var bead_int = (int3 * 1) * 500;
    var powder_int = (int4 * 1) * 100;
    // console.log(fruit_int);
    // console.log(elixir_int);
    // console.log(bead_int);
    // console.log(powder_int);

    var fruit_pol = (pol1 * 1) * 5000;
    var elixir_pol = (pol2 * 1) * 1000;
    var bead_pol = (pol3 * 1) * 500;
    var powder_pol = (pol4 * 1) * 100;
    // console.log(fruit_pol);
    // console.log(elixir_pol);
    // console.log(bead_pol);
    // console.log(powder_pol);

    var fruit_char = (char1 * 1) * 5000;
    var elixir_char = (char2 * 1) * 1000;
    var bead_char = (char3 * 1) * 500;
    var powder_char = (char4 * 1) * 100;
    // console.log(fruit_char);
    // console.log(elixir_char);
    // console.log(bead_char);
    // console.log(powder_char);


    var str_sum = (fruit_str * 1) + (elixir_str * 1) + (bead_str * 1) + (powder_str * 1);
    // console.log(str_sum);

    var int_sum = (fruit_int * 1) + (elixir_int * 1) + (bead_int * 1) + (powder_int * 1);
    // console.log(int_sum);

    var pol_sum = (fruit_pol * 1) + (elixir_pol * 1) + (bead_pol * 1) + (powder_pol * 1);
    // console.log(pol_sum);

    var char_sum = (fruit_char * 1) + (elixir_char * 1) + (bead_char * 1) + (powder_char * 1);
    // console.log(char_sum);

    var str_result = (str_sum * 1) * (str_per * 1) / 100;
    console.log(str_sum);
    console.log(str_per);
    console.log(str_result);

    var int_result = (int_sum * 1) * (int_per * 1) / 100;
    console.log(int_sum);
    console.log(int_per);
    console.log(int_result);

    var pol_result = (pol_sum * 1) * (pol_per * 1) / 100;
    console.log(pol_sum);
    console.log(pol_per);
    console.log(pol_result);

    var char_result = (char_sum * 1) * (char_per * 1) / 100;
    console.log(char_sum);
    console.log(char_per);
    console.log(char_result);


    var sum_result = (str_result * 1) + (int_result * 1) + (pol_result * 1) + (char_result * 1);

    let r_sum = power(sum_result);
    function power(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(r_sum);

    let s_sum = power(str_result);
    function power(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(s_sum);

    let i_sum = power(int_result);
    function power(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(i_sum);

    let p_sum = power(pol_result);
    function power(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(p_sum);

    let c_sum = power(char_result);
    function power(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    console.log(c_sum);

    document.getElementById("result").innerHTML = 'ค่าบารมีรวมที่ได้ : ' + r_sum;
    document.getElementById("s_result").innerHTML = 'ค่ายุทธที่ได้ : ' + s_sum;
    document.getElementById("i_result").innerHTML = 'ค่าปัญญาที่ได้ : ' + i_sum;
    document.getElementById("p_result").innerHTML = 'ค่าปกครองที่ได้ : ' + p_sum;
    document.getElementById("c_result").innerHTML = 'ค่าสเน่ห์ที่ได้ : ' + c_sum;

    Swal.fire({

        title: 'คำนวณสำเร็จ !!',
        text: 'คุณได้บารมีรวมทั้งหมด : ' + r_sum,

    })

}