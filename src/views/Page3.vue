<template>
    <div class="page3">
     <aside>
      <ul>
       <li><router-link to="section1"></router-link></li>
       <li><router-link to="section2"></router-link></li>
       <li><router-link to="section3"></router-link></li>
       <li><router-link to="section4"></router-link></li>
     </ul> 
     </aside>
     <main>
         <router-view/>
     </main>
    </div>
 </template>
 <script>
 
 
 export default{
     name: "page3",
 };
 </script>
 <style scoped>
 .page1 {
   display: flex;
 }
 
 aside {
   width: 200px;
   background-color: #f8f8f8;
   padding: 10px;
   border-right: 1px solid #ccc;
 }
 
 aside ul {
   list-style: none;
   padding: 0;
 }
 
 aside li {
   margin-bottom: 10px;
 }
 
 aside a {
   text-decoration: none;
   color: #333;
 }
 
 main {
   flex: 1;
   padding: 20px;
 }
 </style>
 