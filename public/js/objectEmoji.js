
class Emoji {
    constructor(backgroundAnimate) {
        this.step = 0;
        this.position = 0;
        this.m = null;
        this.backgroundAnimate = backgroundAnimate;
        this.selector = null;
    }
    runAnimations() {
        this.m = setInterval(() => {
            this.step = this.step - 1;
            this.position = this.step * 130;
            let css = {
                "background-position": this.position + "px",
                width: "130px",
                height: "130px",
                "background-image": "url(" + this.backgroundAnimate + ")"
            };
            this.selector.css(css);
        }, 100);
        setTimeout(() => {
            clearInterval(this.m);
            this.m = null;
        }, 5000);
        this.selector.hover( () =>{
            if (this.m === null) {
                this.runAnimations();
            }
        });
    }
}



var mmm5 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41317&size=130&checksum=fea0a6f586a345f11dad32742eced7cc"
);
$("#emoji").prepend($("<div class='div5'>"));
mmm5.selector = $(".div5");
console.log(mmm5);
mmm5.runAnimations();
var mmm6 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=32052&size=130&checksum=81b1c1e44cb8249a3853d4e4fdb7b172"
);
$("#emoji").prepend($("<div class='div6'>"));
mmm6.selector = $(".div6");
console.log(mmm6);
mmm6.runAnimations();
var mmm7 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41320&size=130&checksum=c964e27d325b7da39e3596559e4a13a5"
);
$("#emoji").prepend($("<div class='div7'>"));
mmm7.selector = $(".div7");
console.log(mmm7);
mmm7.runAnimations();
var mmm8 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41322&size=130&checksum=792bf575f4ac621043595159eb5978cf"
);
$("#emoji").prepend($("<div class='div8'>"));
mmm8.selector = $(".div8");
console.log(mmm8);
mmm8.runAnimations();
var mmm9 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=21517&size=130&checksum=d02d94481fdb2b18b4ae591801ad7251"
);
$("#emoji").prepend($("<div class='div9'>"));
mmm9.selector = $(".div9");
console.log(mmm9);
mmm9.runAnimations();
var mmm10 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41287&size=130&checksum=ee926bfcfeeb42205fd3cad80a544c3c"
);
$("#emoji").prepend($("<div class='div10'>"));
mmm10.selector = $(".div10");
console.log(mmm10);
mmm10.runAnimations();
var mmm11 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=1115&size=130&checksum=410741e063f327f0406b00491d09dc24"
);
$("#emoji").prepend($("<div class='div11'>"));
mmm11.selector = $(".div11");
console.log(mmm11);
mmm11.runAnimations();
var mmm12 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41312&size=130&checksum=375be3ef839f13c1c98652d4dd282f49"
);
$("#emoji").prepend($("<div class='div12'>"));
mmm12.selector = $(".div12");
console.log(mmm12);
mmm12.runAnimations();
var mmm13 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=32058&size=130&checksum=3768cea1c9fae5980e6388ea71c220ed"
);
$("#emoji").prepend($("<div class='div13'>"));
mmm13.selector = $(".div13");
console.log(mmm13);
mmm13.runAnimations();

////////////// 14 //////////////////////////////////
var mmm15 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45825&size=130&checksum=6c1c4d648be6159386220d3d6a11aa13"
);
$("#emoji").prepend($("<div class='div15'>"));
mmm15.selector = $(".div15");
console.log(mmm15);
mmm15.runAnimations();
////////////// 15 //////////////////////////////////
var mmm16 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45826&size=130&checksum=c92ca88ec8b5ceca8dd33511fd36b526"
);
$("#emoji").prepend($("<div class='div16'>"));
mmm16.selector = $(".div16");
console.log(mmm16);
mmm16.runAnimations();
////////////// 16 //////////////////////////////////
var mmm17 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45827&size=130&checksum=8ac1531e000c36f29bddaee04d95decb"
);
$("#emoji").prepend($("<div class='div17'>"));
mmm17.selector = $(".div17");
console.log(mmm17);
mmm17.runAnimations();
////////////// 17 //////////////////////////////////
var mmm18 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45828&size=130&checksum=094995202354a8b760c959806f060cf8"
);
$("#emoji").prepend($("<div class='div18'>"));
mmm18.selector = $(".div18");
console.log(mmm18);
mmm18.runAnimations();
////////////// 18 //////////////////////////////////
var mmm19 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45832&size=130&checksum=1951897cd068740162ae2b209c890193"
);
$("#emoji").prepend($("<div class='div19'>"));
mmm19.selector = $(".div19");
console.log(mmm19);
mmm19.runAnimations();
////////////// 19 //////////////////////////////////
var mmm20 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45831&size=130&checksum=4871c49d050937aebe03d49b3e890936"
);
$("#emoji").prepend($("<div class='div20'>"));
mmm20.selector = $(".div20");
console.log(mmm20);
mmm20.runAnimations();
////////////// 20 //////////////////////////////////
var mmm21 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45830&size=130&checksum=ea8e95fd0c5befb5c441378c453ff5dd"
);
$("#emoji").prepend($("<div class='div21'>"));
mmm21.selector = $(".div21");
console.log(mmm21);
mmm21.runAnimations();
////////////// 21 //////////////////////////////////
var mmm22 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45829&size=130&checksum=66c36312c704cbe6c37fddb059dac831"
);
$("#emoji").prepend($("<div class='div22'>"));
mmm22.selector = $(".div22");
console.log(mmm22);
mmm22.runAnimations();
////////////// 22 //////////////////////////////////
var mmm23 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45833&size=130&checksum=befdefa40f2689da12a6519e00e9014c"
);
$("#emoji").prepend($("<div class='div23'>"));
mmm23.selector = $(".div23");
console.log(mmm23);
mmm23.runAnimations();
////////////// 23 //////////////////////////////////
var mmm24 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45834&size=130&checksum=cab2be212373b35e67d9c47c9b2e415b"
);
$("#emoji").prepend($("<div class='div24'>"));
mmm24.selector = $(".div24");
console.log(mmm24);
mmm24.runAnimations();
////////////// 24 //////////////////////////////////
var mmm25 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45835&size=130&checksum=20a5d33cade76b206cb6ca5b80f10574"
);
$("#emoji").prepend($("<div class='div25'>"));
mmm25.selector = $(".div25");
console.log(mmm25);
mmm25.runAnimations();
////////////// 25 //////////////////////////////////
var mmm26 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45836&size=130&checksum=3e2faf94c014a4abeb53f8b6811be690"
);
$("#emoji").prepend($("<div class='div26'>"));
mmm26.selector = $(".div26");
console.log(mmm26);
mmm26.runAnimations();
////////////// 26 //////////////////////////////////
var mmm27 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45840&size=130&checksum=68b39274a48a7dda6940a5a9e11528be"
);
$("#emoji").prepend($("<div class='div27'>"));
mmm27.selector = $(".div27");
console.log(mmm27);
mmm27.runAnimations();
////////////// 27 //////////////////////////////////
var mmm28 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45839&size=130&checksum=c99cc7fa3139336ffae6ca6c8b8c9cfd"
);
$("#emoji").prepend($("<div class='div28'>"));
mmm28.selector = $(".div28");
console.log(mmm28);
mmm28.runAnimations();
////////////// 28 //////////////////////////////////
var mmm29 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45838&size=130&checksum=a067bfe814a8606278be207327615d52"
);
$("#emoji").prepend($("<div class='div29'>"));
mmm29.selector = $(".div29");
console.log(mmm29);
mmm29.runAnimations();
////////////// 29 //////////////////////////////////
var mmm30 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=45837&size=130&checksum=2545eba909edcbce00e18a8a6cf9b451"
);
$("#emoji").prepend($("<div class='div30'>"));
mmm30.selector = $(".div30");
console.log(mmm30);
mmm30.runAnimations();
////////////// 30 //////////////////////////////////
var mmm31 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41308&size=130&checksum=a8499e77109a4408c9363d83b970a0aa"
);
$("#emoji").prepend($("<div class='div31'>"));
mmm31.selector = $(".div31");
console.log(mmm31);
mmm31.runAnimations();
////////////// 31 //////////////////////////////////
var mmm32 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41309&size=130&checksum=c33024579f6716922b17430a5a5bb269"
);
$("#emoji").prepend($("<div class='div32'>"));
mmm32.selector = $(".div32");
console.log(mmm32);
mmm32.runAnimations();
////////////// 32 //////////////////////////////////
var mmm33 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41310&size=130&checksum=203ab3f1303c179e84363b60c971542c"
);
$("#emoji").prepend($("<div class='div33'>"));
mmm33.selector = $(".div33");
console.log(mmm33);
mmm33.runAnimations();
////////////// 33 //////////////////////////////////
var mmm34 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41311&size=130&checksum=3fbb22ca179f3e0b246575af5acf1184"
);
$("#emoji").prepend($("<div class='div34'>"));
mmm34.selector = $(".div34");
console.log(mmm34);
mmm34.runAnimations();
////////////// 34 //////////////////////////////////
var mmm35 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41315&size=130&checksum=3d98d1dc59f0fb782338d2cb91b342de"
);
$("#emoji").prepend($("<div class='div35'>"));
mmm35.selector = $(".div35");
console.log(mmm35);
mmm35.runAnimations();
////////////// 35 //////////////////////////////////
var mmm36 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41314&size=130&checksum=dd50d0cc0ec0f5988b841ccb7fdf108d"
);
$("#emoji").prepend($("<div class='div36'>"));
mmm36.selector = $(".div36");
console.log(mmm36);
mmm36.runAnimations();
////////////// 36 //////////////////////////////////
var mmm37 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41313&size=130&checksum=73e69bfa2bb7fa7b27713bf042d75075"
);
$("#emoji").prepend($("<div class='div37'>"));
mmm37.selector = $(".div37");
console.log(mmm37);
mmm37.runAnimations();
////////////// 37 //////////////////////////////////
var mmm38 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41312&size=130&checksum=375be3ef839f13c1c98652d4dd282f49"
);
$("#emoji").prepend($("<div class='div38'>"));
mmm38.selector = $(".div38");
console.log(mmm38);
mmm38.runAnimations();
////////////// 38 //////////////////////////////////
var mmm39 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41316&size=130&checksum=3415116f08675f5ddd7093b730d325ef"
);
$("#emoji").prepend($("<div class='div39'>"));
mmm39.selector = $(".div39");
console.log(mmm39);
mmm39.runAnimations();
////////////// 39 //////////////////////////////////
var mmm40 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41317&size=130&checksum=fea0a6f586a345f11dad32742eced7cc"
);
$("#emoji").prepend($("<div class='div40'>"));
mmm40.selector = $(".div40");
console.log(mmm40);
mmm40.runAnimations();
////////////// 40 //////////////////////////////////
var mmm41 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41318&size=130&checksum=9b750486770042d8e65da5ae16d2450f"
);
$("#emoji").prepend($("<div class='div41'>"));
mmm41.selector = $(".div41");
console.log(mmm41);
mmm41.runAnimations();
////////////// 41 //////////////////////////////////
var mmm42 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41319&size=130&checksum=f2eef84eeee2201d515b73fedc57840d"
);
$("#emoji").prepend($("<div class='div42'>"));
mmm42.selector = $(".div42");
console.log(mmm42);
mmm42.runAnimations();
////////////// 42 //////////////////////////////////
var mmm43 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41323&size=130&checksum=1111fed8ee11477ad6dce14ea5e743ba"
);
$("#emoji").prepend($("<div class='div43'>"));
mmm43.selector = $(".div43");
console.log(mmm43);
mmm43.runAnimations();
////////////// 43 //////////////////////////////////
var mmm44 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41322&size=130&checksum=792bf575f4ac621043595159eb5978cf"
);
$("#emoji").prepend($("<div class='div44'>"));
mmm44.selector = $(".div44");
console.log(mmm44);
mmm44.runAnimations();
////////////// 44 //////////////////////////////////
var mmm45 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41321&size=130&checksum=9d71ad6113ecd9c4a8cf475c7e32c99d"
);
$("#emoji").prepend($("<div class='div45'>"));
mmm45.selector = $(".div45");
console.log(mmm45);
mmm45.runAnimations();
////////////// 45 //////////////////////////////////
var mmm46 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41320&size=130&checksum=c964e27d325b7da39e3596559e4a13a5"
);
$("#emoji").prepend($("<div class='div46'>"));
mmm46.selector = $(".div46");
console.log(mmm46);
mmm46.runAnimations();
////////////// 46 //////////////////////////////////
var mmm47 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41324&size=130&checksum=1e8e43f8fa89aaa5558ea5b64d8aad74"
);
$("#emoji").prepend($("<div class='div47'>"));
mmm47.selector = $(".div47");
console.log(mmm47);
mmm47.runAnimations();
////////////// 47 //////////////////////////////////
var mmm48 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41325&size=130&checksum=d39c9d00ef0762e791923da533358641"
);
$("#emoji").prepend($("<div class='div48'>"));
mmm48.selector = $(".div48");
console.log(mmm48);
mmm48.runAnimations();
////////////// 48 //////////////////////////////////
var mmm49 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41326&size=130&checksum=9c3f8fea3070d53866991d3c214d700f"
);
$("#emoji").prepend($("<div class='div49'>"));
mmm49.selector = $(".div49");
console.log(mmm49);
mmm49.runAnimations();
////////////// 49 //////////////////////////////////
var mmm50 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41327&size=130&checksum=5e4fc6bee5919b3cbada5b9f17b3f10d"
);
$("#emoji").prepend($("<div class='div50'>"));
mmm50.selector = $(".div50");
console.log(mmm50);
mmm50.runAnimations();
////////////// 50 //////////////////////////////////
var mmm51 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41331&size=130&checksum=44f5e9bc6f826eada35206d0d4fa0cd9"
);
$("#emoji").prepend($("<div class='div51'>"));
mmm51.selector = $(".div51");
console.log(mmm51);
mmm51.runAnimations();
////////////// 51 //////////////////////////////////
var mmm52 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41330&size=130&checksum=f4ebbb3f77f90e91b8b09f3ddedf646b"
);
$("#emoji").prepend($("<div class='div52'>"));
mmm52.selector = $(".div52");
console.log(mmm52);
mmm52.runAnimations();
////////////// 52 //////////////////////////////////
var mmm53 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41329&size=130&checksum=3d17ab465e937b61f519f607b55e5d90"
);
$("#emoji").prepend($("<div class='div53'>"));
mmm53.selector = $(".div53");
console.log(mmm53);
mmm53.runAnimations();
////////////// 53 //////////////////////////////////
var mmm54 = new Emoji(
    "https://zalo-api.zadn.vn/api/emoticon/sprite?eid=41328&size=130&checksum=926b0cefbb42bd81efd0ac9601ad0cf9"
);
$("#emoji").prepend($("<div class='div54'>"));
mmm54.selector = $(".div54");
console.log(mmm54);
mmm54.runAnimations();
////////////// 54 //////////////////////////////////
