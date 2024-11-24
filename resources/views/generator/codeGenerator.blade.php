@extends('layout.layout1')

@php
    $headTitle = 'Code Generator';
    $toggle = 'true';
@endphp

@section('content')
    <!-- Main content -->
    <div class="rbt-main-content">
        <div class="rbt-daynamic-page-content">

            <!-- Dashboard Center Content -->
            <div class="rbt-dashboard-content">
                <div class="content-page">
                    <div class="chat-box-list pt--30" id="chatContainer">

                        <!-- Code Generator -->
                        <div class="chat-box author-speech bg-flashlight">
                            <div class="inner">
                                <div class="chat-section">
                                    <div class="author">
                                        <img class="w-100" src="{{ asset('assets/images/team/team-01.png') }}"
                                            alt="Author">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title">You</h6>
                                        <p>Please create a 5 Column table with HTML Css and js</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-box ai-speech bg-flashlight">
                            <div class="inner top-flashlight leftside light-xl">
                                <div class="chat-section generate-section">
                                    <div class="author">
                                        <i class="feather-check-circle"></i>
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title color-text-off mb--0">Scanning the data...</h6>
                                    </div>
                                </div>
                                <div class="chat-section generate-section">
                                    <div class="author">
                                        <img src="{{ asset('assets/images/icons/loader-one.gif') }}" alt="Loader Images">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title color-text-off mb--0">Generating answers for you…</h6>
                                    </div>
                                </div>
                                <div class="chat-section generate-details-section">
                                    <div class="author">
                                        <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}"
                                            alt="ChatenAI">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title mb--20">Certainly! Here's an example of a simple 5-column table
                                            using HTML, CSS, and JavaScript:</h6>
                                        <article class="documentation_body shortcode_text mb--20">

                                            <p id="from-an-html-element" class="c_head load-order-2">HTML Code Blocks</p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-html" data-lang="html">
                                                                &lt;!DOCTYPE html&gt;
                                                                &lt;html lang="en"&gt;
                                                                &lt;head&gt;
                                                                    &lt;meta charset="UTF-8"&gt;
                                                                    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
                                                                    &lt;link rel="stylesheet" href="styles.css"&gt;
                                                                    &lt;title&gt;5 Column Table&lt;/title&gt;
                                                                &lt;/head&gt;
                                                                &lt;body&gt;
                                                                    &lt;div class="table-container"&gt;
                                                                        &lt;table id="data-table"&gt;
                                                                            &lt;thead&gt;
                                                                                &lt;tr&gt;
                                                                                    &lt;th&gt;Column 1&lt;/th&gt;
                                                                                    &lt;th&gt;Column 2&lt;/th&gt;
                                                                                    &lt;th&gt;Column 3&lt;/th&gt;
                                                                                    &lt;th&gt;Column 4&lt;/th&gt;
                                                                                    &lt;th&gt;Column 5&lt;/th&gt;
                                                                                &lt;/tr&gt;
                                                                            &lt;/thead&gt;
                                                                            &lt;tbody&gt;
                                                                                &lt;!-- Table content goes here --&gt;
                                                                            &lt;/tbody&gt;
                                                                        &lt;/table&gt;
                                                                    &lt;/div&gt;

                                                                    &lt;script src="script.js"&gt;&lt;/script&gt;
                                                                &lt;/body&gt;
                                                                &lt;/html&gt;
                                                            </code>
                                                        </pre>
                                            </div>

                                            <p id="css-code" class="c_head load-order-2">CSS Source Code</p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-javascript" data-lang="javascript">
                                                                body {
                                                                    font-family: Arial, sans-serif;
                                                                }
                                                    
                                                                .table-container {
                                                                    margin: 20px;
                                                                    overflow-x: auto;
                                                                }
                                                    
                                                                #data-table {
                                                                    width: 100%;
                                                                    border-collapse: collapse;
                                                                    margin-top: 20px;
                                                                }
                                                    
                                                                #data-table th, #data-table td {
                                                                    border: 1px solid #ddd;
                                                                    padding: 8px;
                                                                    text-align: left;
                                                                }
                                                    
                                                                #data-table th {
                                                                    background-color: #f2f2f2;
                                                                }
                                                            </code>
                                                        </pre>
                                            </div>

                                            <p id="javascript-code-one" class="c_head load-order-2">JavaScript Source Code
                                            </p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-javascript" data-lang="javascript">
                                                                document.addEventListener('DOMContentLoaded', function () {
                                                                    // Sample data to populate the table
                                                                    const data = [
                                                                        ["Row 1, Col 1", "Row 1, Col 2", "Row 1, Col 3", "Row 1, Col 4", "Row 1, Col 5"],
                                                                        ["Row 2, Col 1", "Row 2, Col 2", "Row 2, Col 3", "Row 2, Col 4", "Row 2, Col 5"],
                                                                        ["Row 3, Col 1", "Row 3, Col 2", "Row 3, Col 3", "Row 3, Col 4", "Row 3, Col 5"],
                                                                    ];
                                                    
                                                                    const tableBody = document.querySelector('#data-table tbody');
                                                    
                                                                    // Populate the table with data
                                                                    data.forEach(rowData => {
                                                                        const row = document.createElement('tr');
                                                                        rowData.forEach(cellData => {
                                                                            const cell = document.createElement('td');
                                                                            cell.textContent = cellData;
                                                                            row.appendChild(cell);
                                                                        });
                                                                        tableBody.appendChild(row);
                                                                    });
                                                                });
                                                            </code>
                                                        </pre>
                                            </div>
                                        </article>
                                        <div class="reaction-section">
                                            <div class="btn-grp">
                                                <div class="left-side-btn dropup">
                                                    <button data-bs-toggle="modal" data-bs-target="#likeModal"
                                                        class="react-btn btn-default btn-small btn-border"><i
                                                            class="feather-thumbs-up"></i></button>
                                                    <button data-bs-toggle="modal" data-bs-target="#dislikeModal"
                                                        class="react-btn btn-default btn-small btn-border"><i
                                                            class="feather-thumbs-down"></i></button>
                                                    <button data-bs-toggle="modal" data-bs-target="#shareModal"
                                                        class="react-btn btn-default btn-small btn-border"><i
                                                            class="feather-share"></i></button>
                                                    <button type="button"
                                                        class="react-btn btn-default btn-small btn-border dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="feather-more-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="feather-copy"></i> Copy</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="feather-tag"></i> Pin Chat</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="feather-file-text"></i> Rename</a></li>
                                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                                    </ul>
                                                </div>
                                                <div class="right-side-btn">
                                                    <button class="react-btn btn-default btn-small btn-border">
                                                        <i class="feather-repeat"></i><span>Regenerate</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-box author-speech bg-flashlight">
                            <div class="inner">
                                <div class="chat-section">
                                    <div class="author">
                                        <img class="w-100" src="{{ asset('assets/images/team/team-01.png') }}"
                                            alt="Author">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title">You</h6>
                                        <p>Develop a Pricing Range Application using the MERN Stack</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-box ai-speech bg-flashlight">
                            <div class="inner top-flashlight leftside light-xl">
                                <div class="chat-section generate-section">
                                    <div class="author">
                                        <i class="feather-check-circle"></i>
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title color-text-off mb--0">Scanning the data...</h6>
                                    </div>
                                </div>
                                <div class="chat-section generate-section">
                                    <div class="author">
                                        <img src="{{ asset('assets/images/icons/loader-one.gif') }}" alt="Loader Images">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title color-text-off mb--0">Generating answers for you…</h6>
                                    </div>
                                </div>
                                <div class="chat-section generate-details-section">
                                    <div class="author">
                                        <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}"
                                            alt="ChatenAI">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="title mb--20">Certainly! Here's an example of Developing a Pricing Range
                                            Application using the MERN Stack</h6>
                                        <article class="documentation_body shortcode_text mb--20">
                                            <p class="mb--20">Building a Pricing Range Application using the MERN (MongoDB,
                                                Express.js, React, Node.js) stack involves creating a full-stack web
                                                application that allows users to input various parameters and receive a
                                                pricing range based on certain criteria. Here's a step-by-step guide to help
                                                you get started:</p>
                                            <h4 class="mb">Step 1: Set Up Your Development Environment</h4>
                                            <p class="mb--20">Make sure you have Node.js and npm installed on your machine.
                                                You'll also need MongoDB for your database.</p>
                                            <h4 class="mb--20">Step 2: Set Up the Backend (Node.js and Express)</h4>
                                            <p id="bash-code-one" class="c_head load-order-2">1. Initialize your project:
                                            </p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-bash" data-lang="bash">
                                                                mkdir pricing-range-app
                                                                cd pricing-range-app
                                                                npm init -y
                                                            </code>
                                                        </pre>
                                            </div>
                                            <p id="bash-code-two" class="c_head load-order-2">2. Install dependencies:</p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-bash" data-lang="bash">
                                                                npm install express mongoose cors
                                                            </code>
                                                        </pre>
                                            </div>
                                            <p id="javascript-code-two" class="c_head load-order-2">3. Create a server
                                                file (e.g., server.js):</p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-javascript" data-lang="javascript">
                                                                const express = require('express');
                                                                const mongoose = require('mongoose');
                                                                const cors = require('cors');

                                                                const app = express();
                                                                const PORT = process.env.PORT || 5000;

                                                                // Middleware
                                                                app.use(cors());
                                                                app.use(express.json());

                                                                // MongoDB Connection
                                                                mongoose.connect('mongodb://localhost/pricing-range-db', {
                                                                useNewUrlParser: true,
                                                                useUnifiedTopology: true,
                                                                });

                                                                // Define your MongoDB schema and model here

                                                                // Define your API routes here

                                                                app.listen(PORT, () => {
                                                                console.log(`Server is running on port ${PORT}`);
                                                                });
                                                            </code>
                                                        </pre>
                                            </div>
                                            <p class="mb">4. Define MongoDB schema and model:</p>
                                            <p class="mb--20">Create a models folder and define your MongoDB schema and
                                                model for storing pricing-related data.</p>

                                            <h4 class="mb--20">Step 3: Set Up the Frontend (React)</h4>
                                            <p id="bash-code-three" class="c_head load-order-2">1. Initialize your React
                                                app:</p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-bash" data-lang="bash">
                                                                npx create-react-app client
                                                            </code>
                                                        </pre>
                                            </div>
                                            <p id="bash-code-four" class="c_head load-order-2">2. Install dependencies:
                                            </p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-bash" data-lang="bash">
                                                                cd client
                                                                npm install axios
                                                            </code>
                                                        </pre>
                                            </div>
                                            <p class="mb--20">4.Create components for your frontend application.</p>
                                            <p class="mb--20">5.Set up API calls using Axios to communicate with your
                                                backend.</p>
                                            <h4 class="mb--20">Step 4: Connect Backend and Frontend</h4>
                                            <p id="javascript-code-three" class="c_head load-order-2">Modify your backend
                                                to serve the React app:</p>
                                            <div class="highlight">
                                                <pre>
                                                            <code class="language-javascript" data-lang="javascript">
                                                                if (process.env.NODE_ENV === 'production') {
                                                                    app.use(express.static('client/build'));
                                                                  
                                                                    app.get('*', (req, res) => {
                                                                      res.sendFile(path.resolve(__dirname, 'client', 'build', 'index.html'));
                                                                    });
                                                                  }
                                                            </code>
                                                        </pre>
                                            </div>
                                        </article>
                                        <div class="reaction-section">
                                            <div class="btn-grp">
                                                <div class="left-side-btn dropup">
                                                    <button data-bs-toggle="modal" data-bs-target="#likeModal"
                                                        class="react-btn btn-default btn-small btn-border"><i
                                                            class="feather-thumbs-up"></i></button>
                                                    <button data-bs-toggle="modal" data-bs-target="#dislikeModal"
                                                        class="react-btn btn-default btn-small btn-border"><i
                                                            class="feather-thumbs-down"></i></button>
                                                    <button data-bs-toggle="modal" data-bs-target="#shareModal"
                                                        class="react-btn btn-default btn-small btn-border"><i
                                                            class="feather-share"></i></button>
                                                    <button type="button"
                                                        class="react-btn btn-default btn-small btn-border dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="feather-more-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="feather-copy"></i> Copy</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="feather-tag"></i> Pin Chat</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="feather-file-text"></i> Rename</a></li>
                                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                                    </ul>
                                                </div>
                                                <div class="right-side-btn">
                                                    <button class="react-btn btn-default btn-small btn-border">
                                                        <i class="feather-repeat"></i><span>Regenerate</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="rbt-static-bar">
                    <form class="new-chat-form border-gradient">
                        <textarea id="txtarea" rows="1" placeholder="Send a message..."></textarea>
                        <div class="left-icons">
                            <div title="ChatenAI" class="form-icon icon-gpt">
                                <i class="feather-aperture"></i>
                            </div>
                        </div>
                        <div class="right-icons">
                            <div class="form-icon icon-plus" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Choose File">
                                <input type="file" class="input-file" name="myfile" multiple>
                                <i class="feather-plus-circle"></i>
                            </div>
                            <button class="form-icon icon-mic" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Voice Search">
                                <i class="feather-mic"></i>
                            </button>
                            <button class="form-icon icon-send" id="sendButton" onclick="sendMessage()"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Send message">
                                <i class="feather-send"></i>
                            </button>
                        </div>
                    </form>
                    <p class="b3 small-text">CraftedFate can make mistakes. Consider checking important information.</p>
                </div>
            </div>

            <!-- Dashboard Right Content -->
            <div class="rbt-right-side-panel popup-dashboardright-section">

                <div class="right-side-top">
                    <a class="btn-default bg-solid-primary" data-bs-toggle="modal" data-bs-target="#newchatModal">
                        <span class="icon"><i class="feather-plus-circle"></i></span>
                        <span>New Chat</span>
                    </a>
                </div>
                <div class="right-side-bottom">
                    <div class="small-search search-section mb--20">
                        <input type="search" placeholder="Search Here...">
                        <i class="feather-search"></i>
                    </div>

                    <div class="chat-history-section">
                        <h6 class="title">Today</h6>
                        <ul class="chat-history-list">
                            <li class="history-box active">
                                CraftedFate Defination
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Your last Question
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Business Shortcurt Methode
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Best way to maintain code Quality
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="chat-history-section has-show-more">
                        <h6 class="title">Yesterday</h6>
                        <ul class="chat-history-list has-show-more-inner-content">
                            <li class="history-box">
                                How to write a code
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Form Html CSS JS
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                HTML Shortcurt Methode
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Best way to maintain code Quality
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                CraftedFate Defination
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Your last Question
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Unique Shortcurt Methode
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Generate a circle Image
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="rbt-show-more-btn">Show More</div>
                    </div>

                    <div class="chat-history-section has-show-more">
                        <h6 class="title">Previous 7 days</h6>
                        <ul class="chat-history-list has-show-more-inner-content">
                            <li class="history-box">
                                User Assistant Request
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Funtion Js
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Generate a Image
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Best way to maintain code Quality
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                CraftedFate Defination
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Your last Question
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Business Shortcurt Methode
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Best way to maintain Remote Team
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="rbt-show-more-btn">Show More</div>
                    </div>

                    <div class="chat-history-section mb--100 has-show-more">
                        <h6 class="title">November</h6>
                        <ul class="chat-history-list has-show-more-inner-content">
                            <li class="history-box">
                                AI writing: Free Trial
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Your last Question
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Education Shortcurt Methode
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                1992 Environment Policy
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Senior UX/UI Design
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Your last Question
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Dark Mode Html CSS JS
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="history-box">
                                Best way to maintain code Quality
                                <div class="dropdown history-box-dropdown">
                                    <button type="button" class="more-info-icon dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="feather-more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i>
                                                Regenerate</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin
                                                Chat</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i>
                                                Rename</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"><i
                                                    class="feather-trash-2"></i> Delete Chat</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="rbt-show-more-btn">Show More</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
