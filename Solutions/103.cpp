#include <bits/stdc++.h>
#define MAX 1000006
using namespace std;
char ch[1000006];
int node=1,root;

struct T
{
	int mark[27];
	int cnt[27];
};
struct T trie[MAX];
void insert(char ch[])
{
	//printf("%s\n",ch);
	int curr=root;
	int k ;
	for(int i=strlen(ch)-1;i>=0;i--)
	{
		k = ch[i]-'a';
		if(trie[curr].mark[k]==0)
		{
			//trie[curr].init();
			trie[curr].mark[k] = node++;
			//printf("%d %d\n",curr,k);
			//printf(" Inside %c\n",k+'a');
			
		}
		//printf("%d %d %d\n",curr,k,trie[curr].cnt[k]);
		trie[curr].cnt[k]++;
		curr = trie[curr].mark[k];

	}
	
}

int check(char ch[])
{
	int curr=root;
	int k;
	int prev;
	for(int i=strlen(ch)-1;i>=0;i--)
	{
		k = ch[i]-'a';
		//printf(" k :%d\n",k);
		//printf(" cnt : %d\n",trie[curr].cnt[k]);
		if(trie[curr].mark[k]==0)
		{
			return 0;
		}
		prev=curr;
		curr = trie[curr].mark[k];

	}
	//printf(" cnt  LAS :%d\n",trie[prev].cnt[k]);
	return trie[prev].cnt[k];
}
int main()
{

	int n;
	cin>>n;
	root=0;
	
	for(int i=0;i<n;i++)
	{
		scanf("%s",ch);
		insert(ch);
	}
	int q;
	cin>>q;
	while(q--)
	{
		scanf("%s",ch);
		printf("%d\n",check(ch));
	}
	return 0;
}