#include <bits/stdc++.h>
#define MAX 1000006
using namespace std;


int tree[4*100005 + 4];
int lazy[4*100005 + 4];
char ch[100005];


void build_tree(int node,int a,int b)
{
	if(a>b)
		return ;

	if(a==b)
	{
		tree[node] = ch[a]-'0';
		return ;
	}

	build_tree(2*node,a,(a+b)/2);
	build_tree(2*node+1,(a+b)/2+1,b);

	tree[node] = (tree[2*node]+tree[2*node+1])%10;
}

void update(int node,int a,int b,int i,int j,int val)
{
	if(lazy[node]!= 0)
	{
		tree[node] += (b-a+1)*lazy[node];
		tree[node]%=10;
		if(a!=b)
		{
			lazy[2*node] +=lazy[node];
			lazy[2*node+1] += lazy[node];
		}
		lazy[node] = 0;
	}
	if(a>b || a>j || b<i)
		return ;

	if(a>=i && b<=j)
	{
		tree[node] += (b-a+1)*val;
		tree[node]%=10;
		if(a!=b)
		{
			lazy[2*node] +=val;
			lazy[2*node+1] +=val;
		}
		return ;
	}

	update(2*node,a,(a+b)/2,i,j,val);
	update(2*node+1,(a+b)/2+1,b,i,j,val);

	tree[node] = (tree[node*2] + tree[2*node+1])%10;

}

int query_tree(int node,int a,int b,int i,int j)
{

	if(a>b || a>j || b<i)
		return 0;

	if(lazy[node]!=0)
	{
		tree[node] += (b-a+1)*lazy[node];
		tree[node]%=10;
		if(a!=b)
		{
			lazy[2*node] += lazy[node];
			lazy[2*node+1] += lazy[node];
		}
		lazy[node] = 0;
	}

	if(a>=i && b<=j)
	{
		return tree[node];
	}
	
	int q1 = query_tree(2*node,a,(a+b)/2,i,j);
	int q2 = query_tree(2*node+1,(a+b)/2+1,b,i,j);
	return (q1+q2);
}

int main()
{
	scanf("%s",ch);
	memset(lazy,0,sizeof(lazy));
	int n = strlen(ch);
	build_tree(1,0,n-1);
	int q;
	scanf("%d",&q);
	while(q--)
	{
		int u,x,y,z;
		scanf("%d",&u);
		if(u==1)
		{
			scanf("%d %d %d",&x,&y,&z);
			update(1,0,n-1,x-1,y-1,z);
		}
		else
		{
			scanf("%d %d",&x,&y);
			int xx= query_tree(1,0,n-1,x-1,y-1);
			
			if(xx%3==0)
			{
				printf("Yes\n");
			}
			else
				printf("No\n");
		}
	}
	return 0;

	
}