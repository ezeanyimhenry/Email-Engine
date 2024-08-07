import React, { useEffect, useRef, useState } from "react";
import grapesjs from "grapesjs";
import "grapesjs/dist/css/grapes.min.css";
import DashboardLayout from "../Layouts/DashboardLayout";
import { Link } from "@inertiajs/react";

const CreateTemplate = () => {
  const editorRef = useRef(null);
  const [isSaving, setIsSaving] = useState(false);
//   const navigate = useNavigate();

  useEffect(() => {
    const editor = grapesjs.init({
      container: editorRef.current,
      fromElement: true,
      storageManager: false,
      plugins: ["grapesjs-preset-webpage"],
      pluginsOpts: {
        "grapesjs-preset-webpage": {},
      },
      canvas: {
        styles: [
          "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css",
        ],
      },
    });

    // Initialize with an empty design or a default template
    editor.setComponents('<div class="container"><h1>New Template</h1></div>');

    // Optional: Add an event listener for saving changes
    editor.on("component:update", () => {
      // Handle updates if needed
    });

  }, []);

  const handleSave = async () => {
    setIsSaving(true);
    try {
      const { html } = editorRef.current.editor.getHtml();
      const response = await fetch('/api/templates', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ html }),
      });
      const result = await response.json();
      console.log('Save result:', result);
    //   navigate('/dashboard/email-templates'); // Navigate back to the templates list
    } catch (error) {
      console.error('Error saving template:', error);
    } finally {
      setIsSaving(false);
    }
  };

  return (
    <DashboardLayout>
      <div className="flex flex-col h-full">
        <div className="py-6 px-4 sm:px-6 md:px-8">
          <h1 className="text-2xl font-semibold text-gray-900">
            Create New Email Template
          </h1>
          <div className="mt-6">
            <Link
              href="/dashboard/templates"
              className="text-indigo-600 hover:text-indigo-800"
            >
              Back to Templates
            </Link>
          </div>
          <div className="mt-6">
            <div ref={editorRef} className="h-screen bg-white" />
          </div>
          <div className="mt-6 flex justify-end">
            <button
              onClick={handleSave}
              disabled={isSaving}
              className={`inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white ${
                isSaving
                  ? "bg-gray-500 cursor-not-allowed"
                  : "bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
              } transition duration-150 ease-in-out`}
            >
              {isSaving ? 'Saving...' : 'Save Template'}
            </button>
          </div>
        </div>
      </div>
    </DashboardLayout>
  );
};

export default CreateTemplate;
