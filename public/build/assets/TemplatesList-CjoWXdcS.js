import{j as e,a as i}from"./app-CgsGaafV.js";import{u as d,D as t,a as n}from"./DashboardLayout-Dn06Sy3g.js";const c=({templates:a})=>{const r=d({opacity:1,from:{opacity:0}});return e.jsx(t,{children:e.jsx(n.div,{style:r,className:"flex flex-col h-screen bg-gray-100",children:e.jsxs("div",{className:"py-8 px-6 sm:px-8 lg:px-10",children:[e.jsxs("div",{className:"flex justify-between items-center mb-8",children:[e.jsx("h1",{className:"text-4xl font-extrabold text-gray-900",children:"Email Templates"}),e.jsx(i,{href:"/dashboard/templates/new",className:"inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out",children:"New Template"})]}),e.jsx("div",{className:"bg-white shadow-lg rounded-lg overflow-hidden",children:e.jsx("div",{className:"px-6 py-4",children:a.length===0?e.jsx("p",{className:"text-center text-gray-500",children:"No templates available"}):e.jsx("div",{className:"grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6",children:a.map(s=>e.jsxs("div",{className:"bg-gray-50 rounded-lg shadow-md overflow-hidden",children:[e.jsx("img",{className:"w-full h-48 object-cover transition-transform duration-300 transform hover:scale-105",src:s.thumbnail,alt:s.name}),e.jsxs("div",{className:"p-4",children:[e.jsx("h2",{className:"text-xl font-semibold text-gray-800",children:s.name}),e.jsx("p",{className:"text-sm text-gray-500 mt-2",children:s.description}),e.jsx("div",{className:"mt-4",children:e.jsx(i,{href:`/dashboard/templates/${s.id}/edit`,className:"bg-indigo-600 hover:bg-indigo-800 text-white px-4 py-2 rounded-md",children:"Edit"})})]})]},s.id))})})})]})})})};export{c as default};
