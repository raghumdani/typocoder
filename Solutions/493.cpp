#include<iostream>
using namespace std;
int main()
{
	int trees;
	cin>>trees;
	int mango[1010], time[1010];
	for(int i=0;i<trees;i++)
	cin>>mango[i];
	for(int i=0;i<trees;i++)
	cin>>time[i];
	int q, m;
	cin>>q;
	while(q--)
	{
		int m;
		cin>>m;
		int t=0, sum=0;
		while(sum<=m)
		{
			t++;
			for(int i=0;i<trees;i++)
			{
				if(t%time[i]==0)
				sum+=mango[i];
			}
		}
		cout<<t<<endl;
		
	}
}