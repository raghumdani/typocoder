#include<bits/stdc++.h>
using namespace std;

int par[1000006],size[1000006];

void initialize(int n)
{
	int i;
	
	for(i=0;i<=n;i++)
	{
		par[i] = i;
		size [i] = 1; 
	}
	return ;
}

int root(int i)
{
	while(par[i]!=i)
	{
		par[i] = par[ par[i] ];
		i = par[i];
	}
	return i;
}

void union1(int x,int y)
{
	int p1,p2;
	p1 = root(x);
	p2 = root(y);
	
	if(p1 == p2)
		return; 
	if(size[p1] <= size[p2] )
	{
		par[p1] = par[p2];
		size[p2] += size[p1];
		size[p1] = 0;
	}
	else
	{
		par[p2] = par[p1];
		size[p1] += size[p2];
		size[p2] = 0;
	}
   
	return ;   
}

int main()
{
	int n,m,i,x,y,ans=0;
	scanf("%d%d",&n,&m);
	
	initialize(n);
	
	for(i=0;i<m;i++)
	{
		scanf("%d%d",&x,&y);
		
		union1(x,y);
		
	}
	
	for(i=1;i<=n;i++)
	{
	//	printf("%d %d\n",i,size[i]);
		ans+=(size[i]>0);
	}
	printf("%d\n",ans);
	return 0;
}