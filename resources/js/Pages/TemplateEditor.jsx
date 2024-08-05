import React, { useEffect, useRef } from "react";
import grapesjs from "grapesjs";
import "grapesjs/dist/css/grapes.min.css";
import DashboardLayout from "../Layouts/DashboardLayout";
import { Link } from "@inertiajs/react";

const TemplateEditor = ({ templateHtml }) => {
    const editorRef = useRef(null);

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

        editor.setComponents(templateHtml);

        // Optional: Add an event listener for saving changes
        editor.on("component:update", () => {
            // Handle updates, e.g., send changes to the backend
        });
    }, [templateHtml]);

    return (
        <DashboardLayout>
            <div className="flex flex-col h-full">
                <div className="py-6 px-4 sm:px-6 md:px-8">
                    <h1 className="text-2xl font-semibold text-gray-900">
                        Email Templates
                    </h1>
                    <div className="mt-6">
                        <Link
                            href="/dashboard/email-templates/new"
                            className="text-indigo-600 hover:text-indigo-800"
                        >
                            Create New Template
                        </Link>
                    </div>
                    <div className="mt-6">
                        <div ref={editorRef} className="h-screen bg-white" />;
                    </div>
                </div>
            </div>
        </DashboardLayout>
    );
};

export default TemplateEditor;
