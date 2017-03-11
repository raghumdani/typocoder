#include<bits/stdc++.h>
using namespace std;
int n,q;
char s[10000005];
int trie[10000005][30];
int cnt[10000005];
int v;
int x=1;
int main()
{     scanf("%d",&n);
      for(int i=1;i<=n;i++)
      {    scanf("%s",s);
           int sl=strlen(s);
           v=0;
        
           for(int j=sl-1;j>=0;j--)
           {     if(trie[v][(int)s[j]-'a']==0)
                {    trie[v][(int)s[j]-'a']=x++;
				}
				v=trie[v][(int)s[j]-'a'];
				cnt[v]++;
		   }
	}
		   scanf("%d",&q);
		   while(q--)
		   {   scanf("%s",s);
		       int sl=strlen(s);
		       v=0;
		       int ans=0;
		       for(int i=sl-1;i>=0;i-- )
		       {    v=trie[v][(int)s[i]-'a'];
			   }
			   ans=cnt[v];
			   printf("%d\n",ans);
			   
		   }
		   return 0;
 }
