<script>
    async function  getdata(){
        let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json');
        let rawData = await response.text();
        let obj = await JSON.parse(rawData);
        for (let index = 0; index < obj.totalFeatures; index++){
            let num_bed = obj.features[index].properties.num_bed;
            let content = "ชื่อโรงพยาบาล : " + obj.features[index].properties.name+"("+num_bed+")";
            let li = document.createElement("li");
            li.innerHTML = content;
            if(num_bed>91){
                document.getElementById("big").appendChild(li);
            }else if(num_bed>30&&num_bed<=90){
                document.getElementById("medium").appendChild(li);
            }else{
                document.getElementById("small").appendChild(li);
            }
        }
    }
    getdata();
</script>
<h2>โรงพยาบาลเอกชน ในกทม.</h2>
<ul id="hospital" class="w-75">
    <label>
        <h4>โรงพยาบาลขนาดใหญ่</h4>
        <ol id="big"></ol>
    </label>
    <label>
        <h4>โรงพยาบาลขนาดกลาง</h4>
        <ol id="medium"></ol>
    </label>
    <label>
        <h4>โรงพยาบาลขนาดเล็ก</h4>
        <ol id="small"></ol>
    </label>
    
    
    
</ul>