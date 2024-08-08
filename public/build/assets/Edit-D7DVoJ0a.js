import{W as c,j as e,a as o}from"./app-CgsGaafV.js";import{D as m}from"./DashboardLayout-Dn06Sy3g.js";const h=({campaign:l,templates:r})=>{const{data:s,setData:d,put:i,errors:a}=c({title:l.title,content:l.content,email_template_id:l.email_template_id,scheduled_at:l.scheduled_at,status:l.status}),n=t=>{t.preventDefault(),i(`/dashboard/campaigns/${l.id}`)};return e.jsx(m,{children:e.jsx("div",{className:"flex flex-col h-screen bg-gray-100",children:e.jsxs("div",{className:"py-8 px-6 sm:px-8 lg:px-10",children:[e.jsx("h1",{className:"text-2xl font-semibold text-gray-900",children:"Edit Campaign"}),e.jsx("div",{className:"mt-6",children:e.jsx(o,{href:"/dashboard/campaigns",className:"text-indigo-600 hover:text-indigo-800",children:"Back to Campaigns"})}),e.jsx("form",{onSubmit:n,className:"mt-6",children:e.jsxs("div",{className:"bg-white shadow-lg rounded-lg p-6",children:[e.jsxs("div",{className:"mb-4",children:[e.jsx("label",{htmlFor:"title",className:"block text-gray-700",children:"Title"}),e.jsx("input",{type:"text",id:"title",name:"title",value:s.title,onChange:t=>d("title",t.target.value),className:"mt-1 block w-full border border-gray-300 rounded-md p-2"}),a.title&&e.jsx("p",{className:"text-red-500 text-sm",children:a.title})]}),e.jsxs("div",{className:"mb-4",children:[e.jsx("label",{htmlFor:"content",className:"block text-gray-700",children:"Content"}),e.jsx("textarea",{id:"content",name:"content",value:s.content,onChange:t=>d("content",t.target.value),className:"mt-1 block w-full border border-gray-300 rounded-md p-2 h-48"}),a.content&&e.jsx("p",{className:"text-red-500 text-sm",children:a.content})]}),e.jsxs("div",{className:"mb-4",children:[e.jsx("label",{htmlFor:"email_template_id",className:"block text-gray-700",children:"Email Template"}),e.jsxs("select",{id:"email_template_id",name:"email_template_id",value:s.email_template_id,onChange:t=>d("email_template_id",t.target.value),className:"mt-1 block w-full border border-gray-300 rounded-md p-2",children:[e.jsx("option",{value:"",children:"Select a template"}),r.map(t=>e.jsx("option",{value:t.id,children:t.name},t.id))]}),a.email_template_id&&e.jsx("p",{className:"text-red-500 text-sm",children:a.email_template_id})]}),e.jsxs("div",{className:"mb-4",children:[e.jsx("label",{htmlFor:"scheduled_at",className:"block text-gray-700",children:"Scheduled At"}),e.jsx("input",{type:"datetime-local",id:"scheduled_at",name:"scheduled_at",value:s.scheduled_at,onChange:t=>d("scheduled_at",t.target.value),className:"mt-1 block w-full border border-gray-300 rounded-md p-2"}),a.scheduled_at&&e.jsx("p",{className:"text-red-500 text-sm",children:a.scheduled_at})]}),e.jsxs("div",{className:"mb-4",children:[e.jsx("label",{htmlFor:"status",className:"block text-gray-700",children:"Status"}),e.jsxs("select",{id:"status",name:"status",value:s.status,onChange:t=>d("status",t.target.value),className:"mt-1 block w-full border border-gray-300 rounded-md p-2",children:[e.jsx("option",{value:"draft",children:"Draft"}),e.jsx("option",{value:"scheduled",children:"Scheduled"}),e.jsx("option",{value:"sent",children:"Sent"})]}),a.status&&e.jsx("p",{className:"text-red-500 text-sm",children:a.status})]}),e.jsx("button",{type:"submit",className:"inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out",children:"Update Campaign"})]})})]})})})};export{h as default};
