#include <bits/stdc++.h>
#define MAX 1000006
using namespace std;
int a[100005];
int pos[100005],b[100005];
int tree[4*100005 + 4];
int ans[100005];
void update(int node,int ind,int L,int R){
	if(ind==L && ind==R)
	{
		tree[node]=1;
		return ;
	}
	else if(ind<=(L+R)/2)
		update(2*node,ind,L,(L+R)/2);
	else if(ind>(L+R)/2)
		update(2*node+1,ind,(L+R)/2+1,R);

	tree[node] = tree[2*node] + tree[2*node+1];
}

int query(int node,int L,int R,int A,int B){
	if(A==L && B==R)
		return tree[node];

	if(R<=(A+B)/2)
		return query(2*node,L,R,A,(A+B)/2);
	if(L>(A+B)/2)
		return query(2*node+1,L,R,(A+B)/2+1,B);

	int q1 = query(2*node,L,(A+B)/2,A,(A+B)/2);
	int q2 = query(2*node+1,(A+B)/2+1,R,(A+B)/2+1,B);

	return q1+q2;
}

int main()
{
	int n;
	scanf("%d",&n);
	for(int i=0;i<n;i++)
	{
		scanf("%d",&a[i]);

	}
	memset(tree,0,sizeof(tree));
	for(int i=0;i<n;i++)
	{
		scanf("%d",&b[i]);
		pos[b[i]]=i;
	}
	
	
	for(int i=n-1;i>=0;i--)
	{
		update(1,pos[a[i]],0,n-1);
		ans[a[i]] = query(1,0,pos[a[i]],0,n-1);
	}

	for(int i=1;i<=n;i++)
	{
		printf("%d ",ans[i]-1);
	}

	return 0;

	
}