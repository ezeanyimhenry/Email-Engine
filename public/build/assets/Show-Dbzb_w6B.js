import{q as l,R as i,j as s}from"./app-DyA0j1Xd.js";import{u as m,D as n,a as o}from"./DashboardLayout-BsZGXRb9.js";import"./ApplicationLogo-BKEulS55.js";import"./Modal-ClcRjVxP.js";import"./transition-Cp7My-e_.js";const p=()=>{const{template:e}=l().props,[a,t]=m(()=>({opacity:0}));return i.useEffect(()=>{t({opacity:1})},[t]),s.jsx(n,{children:s.jsxs(o.div,{style:a,className:"p-6 bg-white shadow-md rounded-lg",children:[s.jsx("h1",{className:"text-2xl font-semibold",children:"View Email Template"}),s.jsxs("div",{className:"mt-4",children:[s.jsx("h2",{className:"text-xl font-semibold",children:"Name"}),s.jsx("p",{children:e.name})]}),s.jsxs("div",{className:"mt-4",children:[s.jsx("h2",{className:"text-xl font-semibold",children:"Thumbnail"}),e.thumbnail&&s.jsx("img",{src:e.thumbnail,alt:"Thumbnail",className:"w-32 h-32 object-cover"})]}),s.jsxs("div",{className:"mt-4",children:[s.jsx("h2",{className:"text-xl font-semibold",children:"Content"}),s.jsx("div",{dangerouslySetInnerHTML:{__html:e.content}})]})]})})};export{p as default};
