<h1>Index Controller</h1>
<p>Welcome to Lydia index controller.</p>

<h2>Download</h2>
<p>You can download Lydia from github.</p>
<blockquote>
<code>git clone git://github.com/mnsv11/Lydia.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/mnsv11/lydia'>https://github.com/mnsv11/lydia</a></p>
<h2>Installation</h2>
<p>First you have to make the data-directory writable. This is the place where Lydia needs
to be able to write and create files.</p>
<blockquote>
<P>Change in .htaccess </p>
<code>cd lydia; chmod 777 site/data/.ht.sqlite</code><br>
<code>cd lydia; chmod 777 site/data</code>(Maby on this one to)<br>
<code>cd lydia; chmod 777 site/pictures</code><br>
<code>cd lydia; chmod 777 themes/grid</code>


</blockquote>

<p>Second, Lydia has some modules that need to be initialised. You can do this through a 
controller. Point your browser to the following link. After install login and do install again.</p>
<blockquote>
<a href='<?=create_url('modules/install')?>'>modules/install</a>
</blockquote>


