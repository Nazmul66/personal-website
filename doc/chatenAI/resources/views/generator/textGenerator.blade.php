@extends('layout.layout1')

@php
$headTitle = 'Text Generator';
$toggle = "true";
@endphp

@section('content')

<!-- Main content -->
<div class="rbt-main-content">
    <div class="rbt-daynamic-page-content">

        <!-- Dashboard Center Content -->
        <div class="rbt-dashboard-content">
            <div class="content-page">

                <div class="chat-box-list pt--30" id="chatContainer">

                    <!-- Text Generator -->
                    <div class="chat-box author-speech bg-flashlight">
                        <div class="inner">
                            <div class="chat-section">
                                <div class="author">
                                    <img class="w-100" src="{{ asset('assets/images/team/team-01.png') }}" alt="Author">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">You</h6>
                                    <p>What is a chat AI?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box ai-speech bg-flashlight">
                        <div class="inner top-flashlight leftside light-xl">
                            <div class="chat-section generate-section">
                                <div class="author">
                                    <img src="{{ asset('assets/images/icons/loader-one.gif') }}" alt="Loader Images">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title color-text-off mb--0">Generating answers for you…</h6>
                                </div>
                            </div>
                            <div class="chat-section">
                                <div class="author">
                                    <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}" alt="ChatenAI">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">ChatenAI <span class="rainbow-badge-card">Bot</span></h6>
                                    <p class="mb--20">A chat AI, or chatAi, is a type of artificial intelligence designed to simulate conversation with human users, especially through natural language processing. These systems are often used in various applications, including customer service, virtual assistants, and online interactions.</p>
                                    <div class="reaction-section">
                                        <div class="btn-grp">
                                            <div class="left-side-btn dropup">
                                                <button data-bs-toggle="modal" data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-up"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-down"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#shareModal" class="react-btn btn-default btn-small btn-border"><i class="feather-share"></i></button>
                                                <button type="button" class="react-btn btn-default btn-small btn-border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="feather-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="feather-copy"></i> Copy</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                                    <img class="w-100" src="{{ asset('assets/images/team/team-01.png') }}" alt="Author">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">You</h6>
                                    <p>How do chatAI work?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box ai-speech bg-flashlight">
                        <div class="inner top-flashlight leftside light-xl">
                            <div class="chat-section generate-section">
                                <div class="author">
                                    <img src="{{ asset('assets/images/icons/loader-one.gif') }}" alt="Loader Images">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title color-text-off mb--0">Generating answers for you…</h6>
                                </div>
                            </div>
                            <div class="chat-section">
                                <div class="author">
                                    <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}" alt="ChatenAI">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">ChatenAI <span class="rainbow-badge-card">Bot</span></h6>
                                    <p class="mb--20">ChatAi boost operational efficiency and bring cost savings to businesses while offering convenience and added services to internal employees and external customers. They allow companies to easily resolve many types of customer queries and issues while reducing the need for human interaction.</p>
                                    <div class="reaction-section">
                                        <div class="btn-grp">
                                            <div class="left-side-btn dropup">
                                                <button data-bs-toggle="modal" data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-up"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-down"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#shareModal" class="react-btn btn-default btn-small btn-border"><i class="feather-share"></i></button>
                                                <button type="button" class="react-btn btn-default btn-small btn-border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="feather-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="feather-copy"></i> Copy</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                                    <img class="w-100" src="{{ asset('assets/images/team/team-01.png') }}" alt="Author">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">You</h6>
                                    <p>How can i talk with chat AI?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box ai-speech bg-flashlight">
                        <div class="inner top-flashlight leftside light-xl">
                            <div class="chat-section generate-section">
                                <div class="author">
                                    <img src="{{ asset('assets/images/icons/loader-one.gif') }}" alt="Loader Images">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title color-text-off mb--0">Generating answers for you…</h6>
                                </div>
                            </div>
                            <div class="chat-section">
                                <div class="author">
                                    <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}" alt="ChatenAI">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">ChatenAI <span class="rainbow-badge-card">Bot</span></h6>
                                    <p>You're already talking to a chat AI right now! You can ask me anything or discuss various topics. Just type your questions or statements, and I'll do my best to provide helpful and informative responses.</p>
                                    <p class="mb--20">If you have a specific topic in mind or if there's something you'd like to know or discuss, feel free to let me know!</p>
                                    <div class="reaction-section">
                                        <div class="btn-grp">
                                            <div class="left-side-btn dropup">
                                                <button data-bs-toggle="modal" data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-up"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-down"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#shareModal" class="react-btn btn-default btn-small btn-border"><i class="feather-share"></i></button>
                                                <button type="button" class="react-btn btn-default btn-small btn-border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="feather-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="feather-copy"></i> Copy</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                                    <img class="w-100" src="{{ asset('assets/images/team/team-01.png') }}" alt="Author">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">You</h6>
                                    <p>Could I know Everything from chatenAI?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box ai-speech bg-flashlight">
                        <div class="inner top-flashlight leftside light-xl">
                            <div class="chat-section generate-section">
                                <div class="author">
                                    <img src="{{ asset('assets/images/icons/loader-one.gif') }}" alt="Loader Images">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title color-text-off mb--0">Generating answers for you…</h6>
                                </div>
                            </div>
                            <div class="chat-section">
                                <div class="author">
                                    <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}" alt="ChatenAI">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">ChatenAI <span class="rainbow-badge-card">Bot</span></h6>
                                    <p class="mb--20">While ChatenAI is a powerful language model that has been trained on a diverse range of internet text, it doesn't know everything. It has limitations</p>
                                    <div class="reaction-section">
                                        <div class="btn-grp">
                                            <div class="left-side-btn dropup">
                                                <button data-bs-toggle="modal" data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-up"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-down"></i></button>
                                                <button data-bs-toggle="modal" data-bs-target="#shareModal" class="react-btn btn-default btn-small btn-border"><i class="feather-share"></i></button>
                                                <button type="button" class="react-btn btn-default btn-small btn-border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="feather-more-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#"><i class="feather-copy"></i> Copy</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                        <div class="form-icon icon-plus" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Choose File">
                            <input type="file" class="input-file" name="myfile" multiple>
                            <i class="feather-plus-circle"></i>
                        </div>
                        <button class="form-icon icon-mic" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Voice Search">
                            <i class="feather-mic"></i>
                        </button>
                        <button class="form-icon icon-send" id="sendButton" onclick="sendMessage()" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Send message">
                            <i class="feather-send"></i>
                        </button>
                    </div>
                </form>
                <p class="b3 small-text">ChatenAi can make mistakes. Consider checking important information.</p>
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
                            ChatenAI Defination
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Your last Question
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Business Shortcurt Methode
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Best way to maintain code Quality
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Form Html CSS JS
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            HTML Shortcurt Methode
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Best way to maintain code Quality
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            ChatenAI Defination
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Your last Question
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Unique Shortcurt Methode
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Generate a circle Image
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Funtion Js
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Generate a Image
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Best way to maintain code Quality
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            ChatenAI Defination
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Your last Question
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Business Shortcurt Methode
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Best way to maintain Remote Team
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Your last Question
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Education Shortcurt Methode
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            1992 Environment Policy
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Senior UX/UI Design
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Your last Question
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Dark Mode Html CSS JS
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="history-box">
                            Best way to maintain code Quality
                            <div class="dropdown history-box-dropdown">
                                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="feather-more-horizontal"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                    <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
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