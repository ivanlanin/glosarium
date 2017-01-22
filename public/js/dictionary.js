Vue.use(VueHead);var app=new Vue({el:"#app",data:{loading:!1,metadata:{title:Dictionary.metadata.title,meta:[{name:"description",content:Dictionary.metadata.description},{name:"author",content:"Glosarium Indonesia"}]},alerts:{type:"info",message:null},forms:{_token:Laravel.csrfToken,keyword:Dictionary.keyword},inputs:{keyword:{"class":null,disabled:!1}},buttons:{search:{label:"Cari","class":null}},word:null,words:null},head:{title:function(){return{inner:this.metadata.title,separator:" ",complement:" "}},meta:function(){return this.metadata.meta}},mounted:function(){this.forms.keyword&&this.preloadWord(),this.latestWords()},methods:{beforeSearch:function(){this.buttons.search={label:"Mencari...","class":"disabled"},this.inputs.keyword={"class":"disabled",disabled:!0},this.alerts={message:null}},afterSearch:function(){this.buttons.search={label:"Cari","class":null},this.inputs.keyword={"class":null,disabled:!1},this.loading=!1},searchWord:function(t){Dictionary.url.search;this.beforeSearch(),this.$http.post(t.target.action,this.forms).then(function(t){t.ok&&(t.body.word?(this.word=t.body.word,this.metadata.title='Arti Kata "'+this.word.word+'"',this.word.descriptions.length>0&&(this.metadata.meta=[{name:"description",content:this.word.descriptions[0].text}])):(this.alerts={type:"info",message:'Kata "'+this.forms.keyword+'" tidak ditemukan dalam kamus.'},this.metadata.title=this.alerts.message),this.$emit("updateHead")),this.afterSearch()})},latestWords:function(){var t=Dictionary.url.latest;this.$http.get(t).then(function(t){t.ok&&(this.words=t.body.words),this.loading=!1})},preloadWord:function(){var t=Dictionary.url.search;this.beforeSearch(),this.$http.post(t,this.forms).then(function(t){t.ok&&t.body.word?(this.word=t.body.word,this.metadata.title='Arti Kata "'+this.word.word+'"',this.word.descriptions.length>0&&(this.metadata.meta=[{name:"description",content:this.word.descriptions[0].text}]),this.$emit("updateHead")):this.alerts={type:"info",message:"Kata tidak ditemukan dalam kamus."},this.afterSearch()},function(t){this.alerts={type:"danger",message:t.status+": Terjadi kesalahan pada sistem."}})},viewDetail:function(t){this.loading=!0,this.buttons.search={label:"Mencari...","class":"disabled"},this.inputs.keyword={"class":"disabled",disabled:!0},this.forms.keyword=t.target.dataset.keyword,this.preloadWord(),this.latestWords()}}});