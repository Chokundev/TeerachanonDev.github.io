function calculate() {

    const red = document.getElementById('red').value;
    const white = document.getElementById('white').value;

    const s1 = document.getElementById('200_point').value;
    const s2 = document.getElementById('300_point').value;
    const s3 = document.getElementById('500_point').value;
    const s4 = document.getElementById('1000_point').value;


    const h1 = document.getElementById('h_1').value;
    const h2 = document.getElementById('h_2').value;
    const h3 = document.getElementById('h_3').value;
    const h4 = document.getElementById('h_4').value;

    var red_sum = (red *1) * 2 ;
    var white_sum = (white *1) ;
    var heart_result = (red_sum *1) + (white_sum *1);
    console.log(heart_result);

    var sum_s1 = (s1 *1) * 200 ; 
    var sum_s2 = (s2 *1) * 300 ; 
    var sum_s3 = (s3 *1) * 500 ; 
    var sum_s4 = (s4 *1) * 1000 ; 
    var s_result = (sum_s1 *1) + (sum_s2 *1) + (sum_s3 *1) + (sum_s4 *1) ;
    // console.log(s_result);


    var sum_h1 = (h1 *1) * 20 ; 
    var sum_h2 = (h2 *1) * 30 ; 
    var sum_h3 = (h3 *1) * 50 ; 
    var sum_h4 = (h4 *1) * 100 ; 
    var h_result = (sum_h1 *1) + (sum_h2 *1) + (sum_h3 *1) + (sum_h4 *1) ;
    var result = (heart_result *1) + (s_result *1) + (h_result *1) ;
    console.log(result);
    
    let result1 = power(result);  //ประกาศตัวแปร
function power(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

    

    document.getElementById("result").innerHTML = result1;
}