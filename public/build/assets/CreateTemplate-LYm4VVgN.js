import{r,j as e,a as l}from"./app-JC9e3Ff7.js";import{_ as c}from"./grapes.min-MarfYlZV.js";import{D as d}from"./DashboardLayout-v8mhu6CB.js";const x=()=>{const t=r.useRef(null),[a,n]=r.useState(!1);r.useEffect(()=>{const s=c.init({container:t.current,fromElement:!0,storageManager:!1,plugins:["grapesjs-preset-webpage"],pluginsOpts:{"grapesjs-preset-webpage":{}},canvas:{styles:["https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"]}});s.setComponents('<div class="container"><h1>New Template</h1></div>'),s.on("component:update",()=>{})},[]);const o=async()=>{n(!0);try{const{html:s}=t.current.editor.getHtml(),i=await(await fetch("/api/templates",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({html:s})})).json();console.log("Save result:",i)}catch(s){console.error("Error saving template:",s)}finally{n(!1)}};return e.jsx(d,{children:e.jsx("div",{className:"flex flex-col h-full",children:e.jsxs("div",{className:"py-6 px-4 sm:px-6 md:px-8",children:[e.jsx("h1",{className:"text-2xl font-semibold text-gray-900",children:"Create New Email Template"}),e.jsx("div",{className:"mt-6",children:e.jsx(l,{href:"/dashboard/templates",className:"text-indigo-600 hover:text-indigo-800",children:"Back to Templates"})}),e.jsx("div",{className:"mt-6",children:e.jsx("div",{ref:t,className:"h-screen bg-white"})}),e.jsx("div",{className:"mt-6 flex justify-end",children:e.jsx("button",{onClick:o,disabled:a,className:`inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white ${a?"bg-gray-500 cursor-not-allowed":"bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"} transition duration-150 ease-in-out`,children:a?"Saving...":"Save Template"})})]})})})};export{x as default};