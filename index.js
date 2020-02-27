const express=require('express');
const app=express();
app.use ('/f', express.static('files'));
app.use ('/i', express.static('img'));
app.use ('/a', express.static('font-awesome'));
app.get("/form",function(req,res){
res.sendFile (__dirname+"/form.html");
} );
app.get("/summary", function(req, res){
var formData=req.query;
console.log(formData);
res.render("summary", {fdata: req.query})
});

app.get("/index",function(req,res){
res.sendFile (__dirname+"/index.html")
} );
app.get("/pachet",function(req,res){
res.sendFile (__dirname+"/pachet.html")
} );
app.get("/confirmare",function(req,res){
res.sendFile (__dirname+"/confirmare.html")
} );

app.set('view engine','ejs');
app.get("/",function(req,res){
res.sendFile (__dirname+"/index.html")
} );
app.get("/produse/:id",function(req,res){
var idprodus=req.params.id;
var date=carti.find(function(c){return c.id===idprodus});
res.render("profil",{carte: date});
} );
const fs=require('fs');
var books=fs.readFileSync('books.json','utf8' );
var carti=JSON.parse(books);

//var carti=[{id:1, nume:"Kingdom of Ash", autor:"Sarah  Maas", an:2018, gen:["cărți adolescenți","ficțiune", "aventură"]},
//{id:2, nume:"The Intelligent Investor", autor:"Benjamin Graham", an:2006, gen:["cărți științifice","business", "finanțe"]},
//{id:3, nume:"Queen of Air and Darkness", autor:"Cassandra Clare", an:2018, gen:["cărți adolescenți","cărți audio", "ficțiune"]}];

app.listen(4000)
