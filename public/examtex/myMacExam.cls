\LoadClass{exam} 
\RequirePackage{indentfirst,graphicx}   
\RequirePackage{amssymb,amsthm,amsmath}
\RequirePackage[perpage]{footmisc}%stable

\RequirePackage{listings}

\RequirePackage{setspace}

\XeTeXlinebreaklocale  "zh"
\XeTeXlinebreakskip 0pt plus 1pt
%得分框
\newcommand{\dfk}
{
\begin{center}
\begin{large}
\begin{tabular}{|c|c|c|c|c|c|}
  \hline
   %after \\: \hline or \cline{col1-col2} \cline{col3-col4} ...
  ~题~号~ & ~~一~~& ~~二~~ & ~~三~~ & ~~四~~ &  ~总~分~ \\
  \hline
  ~得~分~ & ~~~~~~ & ~~~~~~~~  & ~~~~~~~~   &~~~~~~~~  &~~~~~~~~  \\
  \hline
\end{tabular}
\end{large}
\end{center}
}

\lstset{language=C}%这条命令可以让LaTeX排版时将C++键字突出显示

\lstset{breaklines}%这条命令可以让LaTeX自动将长的代码行换行排版

\lstset{extendedchars=false,aboveskip=1em,numberstyle=\tiny,
showspaces=FALSE,xleftmargin=1cm,numbers=left}%这一条命令可以解决代码跨页时，章节标题，页眉等汉字不显示的问题
 
\RequirePackage[a4paper,body={15cm,23.7cm}]{geometry}
\RequirePackage{titlesec,setspace}
\renewcommand{\baselinestretch}{1.7}
\renewcommand{\figurename}{图}

%%试卷页脚

\newcommand\pagestyleA[1]{\firstpagefooter{}{\small《#1》~试题~ (第~\thepage~页,\quad 共~\numpages~页)}{}
\runningfooter{}{\small《#1》~试题~ (第~\thepage~页,\quad 共~\numpages~页)}{}}
\newcommand\pagestyleAanswer[1]{\firstpagefooter{}{\small《#1》~参考答案~ (第~\thepage~页,\quad 共~\numpages~页)}{}
\runningfooter{}{\small《#1》~参考答案~ (第~\thepage~页,\quad 共~\numpages~页)}{}}
\newcommand\pagestyleB{\pagestyle{plain}}
\newcommand\pagestyleC{\firstpagefooter{}{\small 第~\thepage~页}{}
\runningfooter{}{\small第~\thepage~页}{}}


% Table for Grading


\newcommand\xzt[3]{\noindent #1（共$#2$分，每小题$#3$分）}
\newcommand\tkt[3]{ \noindent #1（共$#2$分，每空格$#3$分）}
\newcommand\jdt[3]{ \noindent #1（共$#2$分，每小题$#3$分）}

\newcommand\zmt[3]{\noindent #1（共$#2$分，每小题$#3$分）}


\newcommand\xztk[3]{\fullwidth{{\H \noindent #1{（共$#2$分，每小题$#3$分）}}\hfill \begin{tabular}{|c|c|}
                                                                                            \hline
                                                                                            % after \\: \hline or \cline{col1-col2} \cline{col3-col4} ...
                                                                                            得~分 & ~~~~~~~~~ \\
                                                                                            \hline
                                                                                          \end{tabular}
}}
\newcommand\tktk[3]{\fullwidth{{ \H \noindent#1{（共$#2$分，每空格$#3$分）}}\hfill \begin{tabular}{|c|c|}
                                                                                            \hline
                                                                                            % after \\: \hline or \cline{col1-col2} \cline{col3-col4} ...
                                                                                            得~分 & ~~~~~~~~~ \\
                                                                                            \hline
                                                                                          \end{tabular}
}}
\newcommand\jdtk[3]{\fullwidth{{\H  \noindent#1{（共$#2$分，每小题$#3$分）}}\hfill \begin{tabular}{|c|c|}
                                                                                            \hline
                                                                                            % after \\: \hline or \cline{col1-col2} \cline{col3-col4} ...
                                                                                            得~分 & ~~~~~~~~~ \\
                                                                                            \hline
                                                                                          \end{tabular}
}}
\newcommand\zmtk[3]{\fullwidth{{\H \noindent#1{（共$#2$分，每小题$#3$分）}}\hfill \begin{tabular}{|c|c|}
                                                                                            \hline
                                                                                            % after \\: \hline or \cline{col1-col2} \cline{col3-col4} ...
                                                                                            得~分 & ~~~~~~~~~ \\
                                                                                            \hline
                                                                                          \end{tabular}
}}
\newcommand\jstk[3]{\fullwidth{\H  \noindent#1{{\H（共$#2$分，每小题$#3$分）}}\hfill \begin{tabular}{|c|c|}
                                                                                            \hline
                                                                                            % after \\: \hline or \cline{col1-col2} \cline{col3-col4} ...
                                                                                            得~分 & ~~~~~~~~~ \\
                                                                                            \hline
                                                                                          \end{tabular}
}}


%%装订线
%                    **********************
%                    ** 中文装订线 **
%                    **********************
\newcommand {\zdx}{\newsavebox{\zhuangdingxian}
\sbox{\zhuangdingxian}
    {\parbox{700pt}{
    \centering 
 班~级：\underline{\makebox[34mm][c]{}}~学~号：\underline{\makebox[34mm][c]{}}~~~姓~名：\underline{\makebox[34mm][c]{}} 

\vspace{3mm} \linefill{}装\linefill{}订\linefill{}线\linefill{} }}
\setlength{\marginparsep}{5mm} \reversemarginpar \marginpar{\parbox{10mm}{\vspace{1mm}\rotatebox[origin=c]{90}{
\usebox{\zhuangdingxian}
} }} }

\newcommand {\zdxx}{\newsavebox{\zhuangdingxianx}
\sbox{\zhuangdingxianx}
    {\parbox{700pt}{
    \centering 
 班~级：\underline{\makebox[34mm][c]{}}~学~号：\underline{\makebox[34mm][c]{}}~~~姓~名：\underline{\makebox[34mm][c]{}} 
 
\vspace{3mm} \linefill{}装\linefill{}订\linefill{}线\linefill{} }}
\setlength{\marginparsep}{5mm} \reversemarginpar \marginpar{
\parbox{10mm}{\vspace{5cm}
\vspace{-5cm} 
\rotatebox[origin=c]{90}{
\usebox{\zhuangdingxianx}
} }} }

%                    **********************
%                    ** 试卷头 **
%                    **********************
% Title of the test
\newcommand{\sjt}[4]{\begin{spacing}{0}\begin{center}\LARGE{ \textbf 杭州师范大学理学院#1学年第#2学期期末考试}\end{center}\end{spacing}
\begin{spacing}{0}\begin{center}\LARGE{\textbf 《#3》试题（#4）}\end{center}\end{spacing}\vspace{1.5cm}}
%                    ***********************
%                    ** Fill in the blank **
%                    ***********************
\newcommand\oneb{\underline{\hspace{1em}}\hspace{0.001em}}
\newcommand\blkans[1]{\underline{\hspace{1em}#1\hspace{1em}}\hspace{0.001em}}
\newcommand\twob{\oneb\oneb}
\newcommand{\sixb}{\twob\twob}
\newcommand\tenb{\twob\twob\twob\twob\twob}
%                    *********************
%                    ** Multiple-choice **
%                    *********************
\newcommand{\fourch}[4]{\\\begin{tabular}{*{4}{@{}p{3.5cm}}}(A)~#1 & (B)~#2 & (C)~#3 & (D)~#4\end{tabular}}
\newcommand{\twoch}[4]{\\\begin{tabular}{*{2}{@{}p{7cm}}}(A)~#1 & (B)~#2\end{tabular}\\\begin{tabular}{*{2}{@{}p{7cm}}}(C)~#3 & (D)~#4\end{tabular}}
\newcommand{\ttwoch}[2]{\\\begin{tabular}{*{2}{@{}p{7cm}}}(A)~#1 & (B)~#2\end{tabular}}
\newcommand{\onech}[4]{\\(A)~#1 \\ (B)~#2 \\ (C)~#3 \\ (D)~#4}

\newenvironment{problems}{\begin{questions}}{\end{questions}}
\newcommand{\qu}{\question}





\RequirePackage{fontspec,xltxtra,xunicode,color}
\RequirePackage[colorlinks=true,linkcolor=red,citecolor=red]{hyperref}
\defaultfontfeatures{Mapping=tex-text}
\setromanfont[Mapping=tex-text]{Songti SC}
\setsansfont[Scale=MatchLowercase,Mapping=tex-text]{Songti SC}
\setmonofont[Scale=MatchLowercase]{Songti SC}
\newfontfamily{\H}{Heiti SC Light}

\renewcommand {\t}{\dotfill(\qquad)}
