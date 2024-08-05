import React, { useEffect, useRef, useState } from 'react';
import grapesjs from 'grapesjs';
import 'grapesjs/dist/css/grapes.min.css';
import 'grapesjs-preset-webpage';
import axios from 'axios';

const EmailEditor = ({ templateId }) => {
    const editorRef = useRef(null);
    const [editor, setEditor] = useState(null);

    useEffect(() => {
        if (editorRef.current) {
            const grapesEditor = grapesjs.init({
                container: editorRef.current,
                fromElement: true,
                height: '100%',
                width: 'auto',
                storageManager: false,
                plugins: ['gjs-preset-webpage'],
                pluginsOpts: {
                    'gjs-preset-webpage': {}
                },
            });

            setEditor(grapesEditor);
        }
    }, []);

    useEffect(() => {
        if (editor && templateId) {
            axios.get(`/api/templates/${templateId}`)
                .then(response => {
                    editor.setComponents(response.data.content);
                })
                .catch(error => {
                    console.error('Failed to load template:', error);
                });
        }
    }, [editor, templateId]);

    return (
        <div className="h-full">
            <div ref={editorRef} className="editor-container h-full"></div>
        </div>
    );
};

export default EmailEditor;
