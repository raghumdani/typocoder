#include<iostream>
using namespace std;
int main()
{
	int test;
	cin>>test;
	while(test--)
	{
		int num;
		cin>>num;
		int product=1;
		int temp;
		while(num!=0)
		{
			temp=num%10;
			num=num/10;
			product*=temp;
		}
		cout<<product<<endl;
	}
}