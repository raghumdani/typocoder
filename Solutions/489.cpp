#include<iostream>
using namespace std;
int a[100010];
int main()
{
	int n;
	cin>>n;
	for(int i=0;i<n;i++)
	cin>>a[i];
	int sum=0, write;
	for(int i=0;i<n;i++)
	{	write=a[i];
		for(int j=(i+1)%n;a[j] < write; j=(j+1)%n)
			{
				sum++;
			}
			sum++;
	}
	cout<<sum<<endl;
	
}