#include<iostream>
using namespace std;
int main()
{
	int n;
	cin>>n;
	int m;
	cin>>m;
	int k=0;
	int a[n+10]={0};
	while(m--)
	{
		int x, y;
		cin>>x>>y;
		if(a[x]==0 && a[y]==0)
		{
			a[x]=a[y]=++k;
			
		}
		else
		{
			if(a[x]!=0)
			a[y]=a[x];
			else
			a[x]=a[y];
		}			
	}
	cout<<k<<endl;
	
}